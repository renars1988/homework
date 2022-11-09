<?php declare(strict_types=1);

require_once "Video.php";
require_once "VideoStore.php";

class Application
{
    private VideoStore $videoStore;

    public function __construct(VideoStore $videoStore)
    {
        $this->videoStore = $videoStore;
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 rate video (as user)\n";
            echo "Choose 5 to list inventory\n";

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
                    $this->rateVideo();
                    break;
                case 5:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies()
    {
        $videoCounter = 0;
        while ($videoCounter < 3) {
            $title = readline("Enter the Video title: ");
            $this->videoStore->addVideo($title);
            $videoCounter++;
        }
    }

    private function rentVideo()
    {
        $videos = $this->videoStore->getVideos();
        foreach ($videos as $key => $video) {
            echo "[$key]" . " " . $video->getTitle();
            echo PHP_EOL;
        }
        $selection = (int)readline("Choose video to rent out: ");
        $this->videoStore->checkOutVideo($videos[$selection]->getTitle());
    }

    private function returnVideo()
    {
        $videos = $this->videoStore->getVideos();
        $rentedOut = array_filter($videos, fn(Video $video) => $video->getChecked());
        foreach ($rentedOut as $key => $video) {
            echo "[$key]" . " " . $video->getTitle();
            echo PHP_EOL;
        }
        $selection = (int)readline("Return video: ");
        $this->videoStore->returnVideo($rentedOut[$selection]->getTitle());
    }

    public function rateVideo()
    {
        $videos = $this->videoStore->getVideos();
        foreach ($videos as $key => $video) {
            echo "[$key]" . " " . $video->getTitle();
            echo PHP_EOL;
        }
        $selection = (int)readline("Select video to rate: ");
        $rating = (int)readline("Input your rating (1-5) stars: ");
        $videoToRate = $videos[$selection];
        $videoToRate->rateVideo($rating);
    }

    private function listInventory()
    {
        $videos = $this->videoStore->getVideos();
        foreach ($videos as $video) {
            echo $video->getTitle();
            echo " | rating: " . $video->getAvgRating() . " |";
            echo $video->getChecked() ? " checked out" : " on the shelves";
            echo PHP_EOL;
        }
    }
}

$videoStore = new VideoStore();
$app = new Application($videoStore);
$app->run();
