<?php

namespace PHPMVC\Controllers;



use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegeModel;
use PHPMVC\Models\UserGroupPrivilegeModel;


class PrivilegesController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('privileges.default');
        $this->_data['privileges'] = PrivilegeModel::getALL();
        $this->__view();

    }

    //TODO: WE need to implement csrf prevention

    public function createAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('privileges.labels');
        $this->_language->load('privileges.create');

        if(isset($_POST['submit']))
        {
            $privilege = new PrivilegeModel();
            $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
            $privilege->Privilege = $this->filterString($_POST['Privilege']);

            if($privilege->save())
            {
                $this->redirect('/privileges');
            }
        }

        $this->__view();
    }
    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $privilege = PrivilegeModel::getBYPk($id);

        if($privilege == false)
        {
            $this->redirect('/privileges/default');
        }
        $this->_data['privilege'] = $privilege ;
        $this->_language->load('template.common');
        $this->_language->load('privileges.labels');
        $this->_language->load('privileges.edit');

        if(isset($_POST['submit']))
        {
            $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
            $privilege->Privilege = $this->filterString($_POST['Privilege']);
            if($privilege->save())
            {
                $this->redirect('/privileges/default');
            }
        }

        $this->__view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $privilege = PrivilegeModel::getBYPk($id);

        if($privilege === false)
        {
            $this->redirect('/privileges/default');
        }

        $groupPrivileges = UserGroupPrivilegeModel::getBy(['PrivilegeId' => $privilege->PrivilegeId]);
        if(false !== $groupPrivileges)
        {
            foreach ($groupPrivileges as $groupPrivilege){
                $groupPrivilege->delete();
            }
        }

        if($privilege->delete())
        {
            $this->redirect('/privileges/default');
        }



    }
}