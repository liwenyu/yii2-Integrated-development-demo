<?php

namespace frontend\modules\auth\models;

use \yii\rbac\DbManager;

class Rbac extends DbManager
{

    /**
     * Update permission and roles
     */
    public function updateItem($name, $item)
    {
        parent::updateItem($name, $item);
        return true;
    }

    /**
     * Delete permission or roles.
     * $name 主键名称
     */
    public function deleteItem($name, $params)
    {
        if (isset($name) && !empty($name)) {
            $rbac = new self();
            $rbac->db->createCommand()->delete($this->itemTable, ['name' => $name])->execute();

            if ($params === 'permission') {
                $rbac->db->createCommand()->delete($this->itemChildTable, ['child' => $name])->execute();
            } else if ($params === 'roles') {
                $rbac->db->createCommand()->delete($this->itemChildTable, ['parent' => $name])->execute();
                $rbac->db->createCommand()->delete($this->assignmentTable, ['item_name' => $name])->execute();
            }
        }

        return true;
    }
}