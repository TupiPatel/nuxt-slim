<?php
declare(strict_types=1);

namespace App\Application\Actions\User;
use App\Application\Actions\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



class ExistUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
   
    
    public function __invoke(Request $request, Response $response, $args): Response
    {

        $this->request = $request;
        $this->response = $response;
        $this->args = $args;

        try {
            return $this->action();
        } catch (DomainRecordNotFoundException $e) {
            throw new HttpNotFoundException($this->request, $e->getMessage());
        }
       

      
    }
    protected function action(): Response
    {

        $data =(array)$this->request->getParsedBody();
        
        $json = json_decode($_POST['data'],true);
        $users = $this->userRepository->existUser($json["username"]);

        $this->logger->info("Users is exist.");

        return $this->respondWithData($users);
       // return  $this->response->withHeader('Location', $this->request->getUri());
    }
    
}
