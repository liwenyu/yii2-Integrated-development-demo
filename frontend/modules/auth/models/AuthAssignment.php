<?php

namespace frontend\modules\auth\models;

use Yii;
use common\models\UserModel;

/**
 * This is the model class for table "{{%auth_assignment}}".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => '角色名称',
            'user_id' => '用户ID',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    public function validate($attributeNames = NULL, $clearErrors = true)
    {
        $model = self::find()->where(['item_name' => $this->item_name, 'user_id' => $this->user_id])->all();

        if ($model):
            $this->addError('user_id', '用户 (' .UserModel::getUserName($this->user_id). ') 已经在角色包含.');
            return false;
        else:
            return true;
        endif;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->created_at = time();
            return true;
        } else {
            return false;
        }
    }
}
