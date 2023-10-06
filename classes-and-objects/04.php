<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getStudio(): string
    {
        return $this->studio;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function printMovie(): string
    {
        return "title: {$this->getTitle()}, studio: {$this->getStudio()}, rating: {$this->getRating()}";
    }

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }
}

class MovieList
{
    private array $list;

    public function __construct(Movie ...$movie)
    {
        $this->list = $movie;
    }


    /**
     * @return Movie[]
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @return Movie[]
     */
    public function getPG(): array
    {
        return $this->getMovieByRating("PG");
    }

    /**
     * @return Movie[]
     */
    public function getMovieByRating(string $rating): array
    {
        $returnList = [];
        foreach ($this->getList() as $movie) {
            if ($movie->getRating() === $rating) {
                $returnList[] = $movie;
            }
        }
        return $returnList;
    }

    public function printList(array $list): string
    {
        $returnString = '';
        foreach ($list as $movie) {
            $returnString .= $movie->printMovie() . PHP_EOL;
        }
        return $returnString;
    }
}

$test = new MovieList(
    new Movie("Casino Royale", "Eon Productions", "PG13"),
    new Movie("Glass", "Buena Vista International", "PG13"),
    new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG"),
);

echo $test->printList($test->getPG());

