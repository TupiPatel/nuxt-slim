<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\ExistUserAction;

use App\Application\Actions\Video\ListVideosAction;
use App\Application\Actions\Video\ViewVideoAction;
use App\Application\Actions\Video\CategoryVideoAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response, $args) {
        $data = [
            "status" => 200,
            "message" => "Hello world!"
        ];
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-type', 'application/json');
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
       
        $group->get('/{id}', ViewUserAction::class);
    });
    $app->post('/login',ExistUserAction::class);

    $app->group('/videos', function (Group $group) {
        $group->get('', ListVideosAction::class);
       
        $group->get('/{id}', ViewVideoAction::class);
        $group->get('/category/{category}', CategoryVideoAction::class);
       
    });

   
};
