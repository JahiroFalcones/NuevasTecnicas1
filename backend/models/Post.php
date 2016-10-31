<?php

namespace app\models;
use \yii\db\ActiveRecord;
use yii\db\Expression;
use \yii\behaviors\BlameableBehavior;
use \yii\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $contenido
 * @property integer $autor
 * @property string $fecha
 * @property integer $estado
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'contenido', 'estado'], 'required'],
            [['titulo', 'contenido'], 'string'],
            [['autor', 'estado'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }
    
        public function behaviors() {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'titulo',
                'slugAttribute' => 'seo_slug',
            ],
        ];
    }    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'autor' => 'Autor',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
        ];
    }
}
