<?php

declare(strict_types=1);

class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    public function addSampleData(): void
    {
        $this->videoStore->addVideo("The Matrix");
        $this->videoStore->addVideo("Godfather II");
        $this->videoStore->addVideo("Star Wars Episode IV: A New Hope");
        $this->videoStore->checkOutVideo('The Matrix');
        $this->videoStore->checkOutVideo('Godfather II');
        $this->videoStore->checkOutVideo('Star Wars Episode IV: A New Hope');
        $this->videoStore->returnVideo('Star Wars Episode IV: A New Hope', 1);
        $this->videoStore->returnVideo('The Matrix', 4);
        $this->videoStore->checkOutVideo('The Matrix');
        $this->videoStore->returnVideo('The Matrix', 2);
        $this->videoStore->checkOutVideo('The Matrix');
        $this->videoStore->returnVideo('The Matrix', 5);
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";
            echo "Choose 5 to add sample data\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                case 5:
                    $this->addSampleData();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(): void
    {
        while (true) {
            $command = readline("Add a movie? y/n:");
            if (!($command === 'y')) {
                break;
            }
            $title = readline("Enter title: ");
            if ($this->checkStatus($title) === 'doesNotExist') {
                $this->videoStore->addVideo($title);
            } else {
                echo "Movie already exists\n";
            }
        }
    }

    private function rentVideo(): void
    {
        $title = readline("Enter movie title ");
        switch ($this->checkStatus($title)) {
            case 'inStock':
                $this->videoStore->checkOutVideo($title);
                break;
            case 'rented':
                echo "Sorry, the movie is already rented\n";
                break;
            default:
                echo "Sorry we don't have this movie\n";
                break;
        }
    }

    private function checkStatus(string $title): string
    {
        return (array_key_exists
        (
            $title,
            $this->videoStore->getInventory()
        ))

            ? $this->videoStore->getInventory()[$title]->getStatus()
            : 'doesNotExist';
    }

    private function returnVideo(): void
    {
        $title = readline("Enter movie title ");
        switch ($this->checkStatus($title)) {
            case 'rented':
                $rating = $this->getRatingFromUser();
                $this->videoStore->returnVideo($title, $rating);
                break;
            case 'inStock':
                echo "Sorry, the movie is already on the shelf\n";
                break;
            default:
                echo "Sorry we don't have this movie\n";
                break;
        }
    }

    private function getRatingFromUser(): ?int
    {
        echo "Rate movie.\nwalid ratings are 1...5\n";
        $input = readline("enter rating ");
        return (is_numeric($input)) && ((intval($input) <= 5) && (intval($input) > 0)) ? intval($input) : null;
    }

    private function listInventory(): void
    {
        foreach ($this->videoStore->getInventory() as $video) {
            echo "{$video->getTitle()}, user rating: ({$video->getUserRating()}) status: {$video->getStatus()}\n";
        }
    }
}

class VideoStore
{
    /**
     * @var Video[]
     */
    private array $inventory;

    public function __construct(array $listOfMovies = [])
    {
        $this->inventory = $listOfMovies;
    }

    public function addVideo(string $title): void
    {
        $this->inventory[$title] = new Video($title);
    }

    public function checkOutVideo(string $title): void
    {
        $this->inventory[$title]->checkOut();
    }

    public function returnVideo(string $title, ?int $rating): void
    {
        $this->inventory[$title]->return();
        if ($rating) {
            $this->inventory[$title]->rate($rating);
        }
    }

    /**
     * @return Video[]
     */
    public function getInventory(): array
    {
        return $this->inventory;
    }


}

class Video
{
    private string $title;
    private string $status = 'inStock';
    public array $userRating = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function checkOut(): void
    {
        $this->setStatus('rented');
    }

    public function return(): void
    {
        $this->setStatus('inStock');
    }

    /**
     * @param string $status
     */
    private function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function rate(int $rating): void
    {
        $this->userRating[] = $rating;
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function calculateUserRating(): ?float
    {
        return ($this->userRating) ? round(array_sum($this->userRating) / count($this->userRating), 2) : null;
    }

    public function getUserRating(): string
    {
        return (string)($this->calculateUserRating()) ?: 'No rating';
    }
}

$app = new Application();
$app->run();