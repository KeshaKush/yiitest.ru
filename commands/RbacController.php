<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller {
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Редактирование новости';
        $auth->add($updatePost);

        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // Добавляем правило из класса AuthorRule
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);
        
        // добавляем разрешение "updateOwnPost" и привязываем к нему правило.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Редактирование созданной записи';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        // "updateOwnPost" будет использоваться из "updatePost"
        $auth->addChild($updateOwnPost, $updatePost);

        // разрешаем "автору" обновлять его посты
        $auth->addChild($author, $updateOwnPost);
        
        // добавляем роль "admin" и даём роли разрешение "updatePost", "deletePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);
      
        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($admin, 1);
    }
}
