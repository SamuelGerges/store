<?php

namespace PHPMVC\Controllers;



use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegeModel;
use PHPMVC\Models\UserGroupModel;
use PHPMVC\Models\UserGroupPrivilegeModel;


class UsersGroupsController extends AbstractController
{
    use InputFilter;
    use Helper;


    public function defaultAction()
    {

        $this->_language->load('template.common');
        $this->_language->load('usersgroups.default');
        $this->_data['groups'] = UserGroupModel::getALL();
        $this->__view();

    }

    public function createAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('usersgroups.labels');
        $this->_language->load('usersgroups.create');

        $this->_data['privileges'] = PrivilegeModel::getALL();

        if(isset($_POST['submit']))
        {
            $group = new UserGroupModel();
            $group->GroupName = $this->filterString($_POST['GroupName']);

            if($group->save())
            {
                if(isset($_POST['privileges']) && is_array($_POST['privileges']))
                {
                    foreach ($_POST['privileges'] as $privilegeId)
                    {
                        $groupPrivilege = new UserGroupPrivilegeModel();
                        $groupPrivilege->GroupId = $group->GroupId;
                        $groupPrivilege->PrivilegeId = $privilegeId ;
                        $groupPrivilege->save();
                    }
                }
                $this->redirect('/usersgroups/default');

            }

        }
        $this->__view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $group = UserGroupModel::getByPK($id);

        if($group === false) {
            $this->redirect('/usersgroups');
        }

        $this->_language->load('template.common');
        $this->_language->load('usersgroups.edit');
        $this->_language->load('usersgroups.labels');

        $this->_data['group'] = $group;
        $this->_data['privileges'] = PrivilegeModel::getAll();

        $groupPrivileges= UserGroupPrivilegeModel::getBy(['GroupId' => $group->GroupId]);

        $extractedPrivilegeIds = [];
        if(false !== $groupPrivileges)
        {
            foreach ($groupPrivileges as $privilege)
            {
                $extractedPrivilegeIds[] = $privilege->PrivilegeId;
            }
        }
        $this->_data['groupPrivileges'] = $extractedPrivilegeIds;


        if(isset($_POST['submit']))
        {

            $group->GroupName = $this->filterString($_POST['GroupName']);
            if($group->save())
            {
                if(isset($_POST['privileges']) && is_array($_POST['privileges']))
                {
                    $privilegesIdsToBeDeleted = array_diff($extractedPrivilegeIds,$_POST['privileges']);
                    $privilegesIdsToBeAdded =array_diff($_POST['privileges'],$extractedPrivilegeIds);

                    // Deleted The unwanted privilege
                    foreach ($privilegesIdsToBeDeleted as $deletePrivilege)
                    {
                        $unwantedPrivilege = UserGroupPrivilegeModel::getBy(['PrivilegeIf' => $deletePrivilege , 'GroupId' => $group->GroupId]);
                        var_dump($unwantedPrivilege);
                    }
                    //Add New Privilege
                    foreach ($privilegesIdsToBeAdded as $privilegeId)
                    {
                        $groupPrivilege = new UserGroupPrivilegeModel();
                        $groupPrivilege->GroupId = $group->GroupId;
                        $groupPrivilege->PrivilegeId = $privilegeId ;
                        $groupPrivilege->save();
                    }
                }
                $this->redirect('/usersgroups/default.view.php');

            }

        }
        $this->__view();
    }
    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $group = UserGroupModel::getBYPk($id);
        if($group == false)
        {
            $this->redirect('/usersgroups/default');
        }

        $groupPrivileges = UserGroupPrivilegeModel::getBy(['GroupId' => $group->GroupId]);

        if(false !== $groupPrivileges)
        {
         foreach($groupPrivileges as $groupPrivilege)
         {
             $groupPrivilege->delete();
         }
        }

        if($group->delete())
        {

            $this->redirect('/usersgroups');
        }
    }
}