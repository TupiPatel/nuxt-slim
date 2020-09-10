<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Video;

use App\Domain\Video\Video;
use App\Domain\Video\VideoNotFoundException;
use App\Domain\Video\VideoRepository;

class InMemoryVideoRepository implements VideoRepository
{
    /**
     * @var Video[]
     */
    private $videos;

    /**
     * InMemoryVideoRepository constructor.
     *
     * @param array|null $videos
     */
    public function __construct(array $videos = null)
    {
        $this->videos = $videos ?? [
            1 => new Video(1,  "Testimonials 1", "What it's like to work at AlgaeCal", "Discover what it's like to work at AlgaeCal with this quick video!", "m3ralniniq"),
            2 => new Video(2,  "Testimonials 2", "Esther Mangini Testimonial", "Esther's journey to healthier bones", "ybyot0dm7q"),
            3 => new Video(3,  "Testimonials 2", "Teresa Cucurull Testimonial", "Teresa's journey to healthier bones", "mhmv73k989"),
            4 => new Video(4,  "Testimonials 4", "Perfect Pilates For Osteoporosis - Legwork","Bone Healthy Exercises!", "3n5p02h26w"),
            5 => new Video(5,  "Testimonials 5", "Perfect Pilates For Osteoporosis - Amazing Abs", "Bone Healthy Exercises!", "kkgeu7v2va"),
            6 => new Video(6,  "Testimonials 6", "Lara's Homemade Granola", "Bone Healthy Recipes", "m6amjftj3w"),
            7 => new Video(7,  "Testimonials 7", "Brazil Nut Pesto", "Bone Healthy Recipes", "ajoe5d0jk0"),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->videos);
    }
    /**
     * {@inheritdoc}
     */
    public function findVideoOfId(string $video_id) : Video
    { 

        for($i=1; $i<=7; $i++){
      
            if($this->videos[$i]->getVideo_id() == $video_id)
            {
                return $this->videos[$i];
            }
        }
    }

     /**
     * {@inheritdoc}
     */
    public function findCategory(string $category) :array
    { 
        $categoryArr = [];
        for($i=1; $i<=7; $i++){
      
            if($this->videos[$i]->getCategory() == $category)
            {
                $categoryArr[] = $this->videos[$i];
            }
        }
        return $categoryArr;
    }
   
}
