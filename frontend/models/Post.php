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
    public function rules()
    {
        return [
            [['titulo', 'contenido', 'autor', 'fecha', 'estado'], 'required'],
            [['titulo', 'contenido'], 'string'],
            [['autor', 'estado'], 'integer'],
            [['fecha'], 'safe'],
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
    
    public function getAllLeft($slug){
        
        $query = new \yii\db\Query();
        $query
            ->select(['post.*', 'post.titulo AS titulo','post.contenido AS contenido','post.autor AS autor'   ,'post.estado AS estado' ])
            ->from('post')
            ->where(['post.seo_slug' => $slug]); // COMENTARIOS APROBADOS TAMBIEN EN EL ARRAY
        
            
        $cmd = $query->createCommand();
        $posts = $cmd->queryAll();

        
        return $posts;
    }    
    
    
    
}
