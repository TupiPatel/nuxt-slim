<?php
declare(strict_types=1);

namespace App\Domain\Video;

use JsonSerializable;

class Video implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $video_id;
    private $category;

    /**
     * @param int|null  $id
     * @param string    $title
     * @param string    $description
     * @param string    $video_id
     */
    public function __construct(?int $id,string $category, string $title, string $description, string $video_id)
    {
        $this->id = $id;
        $this->title = ucfirst($title);
        $this->category = strtolower($category);
        $this->description = ucfirst($description);
        $this->video_id = ucfirst($video_id);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getVideo_id(): string
    {
        return $this->video_id;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'title' => $this->title,
            'description' => $this->description,
            'video_id' => $this->video_id,
        ];
    }
}
