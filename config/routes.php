<?php

return [
    'home' => [
        'path' => '/',
        'controller' => App\Controller\HomeController::class
    ],
    'articles' => [
        'path' => '/articles',
        'controller' => App\Controller\ArticlesController::class
    ],
    'article_details' => [
        'path' => '/article/{id}',
        'controller' => App\Controller\ArticleDetailsController::class,
        'params' => [
            'id' => '\d+'
        ]
    ],
    'create_comment' => [
        'path' => '/saveComment/article{id}',
        'controller' => App\Controller\CreateCommentController::class,
        'params' => [
            'id' => '\d+'
        ]
    ],
    'save_comment' => [
        'path' => '/saveComment',
        'controller' => App\Controller\SaveCommentController::class,
    ],
    'contact' => [
        'path' => '/contact',
        'controller' => App\Controller\ContactController::class,
    ],
    'register' => [
        'path' => '/register',
        'controller' => App\Controller\RegisterController::class,
    ],
    'connection' => [
        'path' => '/connection',
        'controller' => App\Controller\ConnectionController::class,
    ],
    'disconnect' => [
        'path' => '/disconnect',
        'controller' => App\Controller\DisconnectController::class,
    ],
    'admin' => [
        'path' => '/admin',
        'controller' => App\Controller\AdminController::class,
    ],
    'create_article' => [
        'path' => '/admin/create_article',
        'controller' => App\Controller\SaveArticleController::class,
    ],
    'list_article' => [
        'path' => '/admin/list_article',
        'controller' => App\Controller\ListArticleController::class,
    ],
    'modif_article' => [
        'path' => '/admin/modif_article/{id}',
        'controller' => App\Controller\ModifArticleController::class,
        'params' => [
            'id' => '\d+'
        ]
    ],
    'modified_article' => [
        'path' => '/admin/modified_article',
        'controller' => App\Controller\ModifiedArticleController::class,
    ],
    'delete_article' => [
        'path' => '/admin/deleteArticle',
        'controller' => App\Controller\DeleteArticleController::class,
    ],
    'modify_comment_list' => [
        'path' => '/admin/commentModif',
        'controller' => App\Controller\ListCommentModifController::class,
    ],
    'modif_comment' => [
        'path' => '/admin/comment/{id}',
        'controller' => App\Controller\ModifCommentController::class,
        'params' => [
            'id' => '\d+'
        ]
    ],
    'modify_comment' => [
        'path' => '/admin/modifyComment',
        'controller' => App\Controller\ModifyCommentController::class,
    ],
    'delete_comment' => [
        'path' => '/admin/deleteComment',
        'controller' => App\Controller\DeleteCommentController::class,
    ],
    'modify_unpublishedComment_list' => [
        'path' => '/admin/unpublishedCommentList',
        'controller' => App\Controller\UnpublishedCommentListController::class,
    ],
    'modif_unpublishedComment' => [
        'path' => '/admin/unpublishedComment/{id}',
        'controller' => App\Controller\UnpublishedCommentController::class,
        'params' => [
            'id' => '\d+'
        ]
    ],
    'publish_comment' => [
        'path' => '/admin/publishComment',
        'controller' => App\Controller\PublishCommentController::class,
    ],
    'forgotten_password' => [
        'path' => '/forgotten_password',
        'controller' => App\Controller\ForgottenPasswordController::class,
    ],
    'new_password_form' => [
        'path' => '/newpassword?token={token}',
        'controller' => App\Controller\NewPasswordFormController::class,
        'params' => [
            'token' => '\d+'
        ]
    ],
];
