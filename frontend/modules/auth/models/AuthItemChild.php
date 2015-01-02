<?php

namespace frontend\modules\auth\models;

use Yii;
use frontend\modules\auth\models\AuthItem;

/**
 * This is the model class for table "{{%auth_item_child}}".
 *
 * @property string $parent
 * @property string $child
 *
 * @property AuthItem $parent0
 * @property AuthItem $child0
 */
class AuthItemChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => '角色',
            'child' => '权限',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'child']);
    }

    public static function getUserAssignMent($parent)
    {
        $roles = yii::$app->session['EmpowermenParent'];
        $data = self::findOne(['parent' => $roles, 'child' => $parent]);
        (isset($data)) ? ($msg = 'checked') : ($msg = '');

        return $msg;
    }

    /**
     * 将权限数据添加到 session 中.
     * @param $parent
     */
    public static function pullSessionChildData($parent)
    {
        $itemchild = self::findAll(['parent' => $parent]);
        if($itemchild){
            foreach ($itemchild as $val) {
                $type = AuthItem::findOne(['name' => $val['child']])->type;
                if ($type == '2') {
                    $empower_child_data[] = $val['child'];
                }
            }
            Yii::$app->session['empower_child_data'] = $empower_child_data;
        }else{
            Yii::$app->session['empower_child_data'] = '';
        }
    }

    /**
     * 验证角色许可是否已经存在
     */
    public static function validated($name, $description)
    {
        $model = self::findOne(['parent' => $name, 'child' => $description]);
        return $model;
    }

    /**
     * 创建授权
     */
    static public function createEmpowerment($name, $description)
    {
        $auth = Yii::$app->authManager;

        $parent = $auth->createRole($name);
        $child = $auth->createPermission($description);

        $auth->addChild($parent, $child);
    }
}
