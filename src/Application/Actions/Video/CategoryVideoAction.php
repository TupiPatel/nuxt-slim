<?php
declare(strict_types=1);

namespace App\Application\Actions\Video;

use Psr\Http\Message\ResponseInterface as Response;

class CategoryVideoAction extends VideoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $category = (string) $this->resolveArg('category');
        $video = $this->videoRepository->findCategory($category);

        $this->logger->info("User of id `${category}` was viewed.");

        return $this->respondWithData($video);
    }
}
