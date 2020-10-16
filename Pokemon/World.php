<?php

/**
 * Main class for our Pokemon program that stores:
 *
 * A List of Wild Pokemon
 * A Single Trainer (who has a list of Pokemons on a Pokedex)
 *
 * Note this is a Singleton and there should only ever be one World object.
 */
class World
{
    // this is called the Singleton pattern, the World class is going to 
    // contain a single instance of a World object and we will store it here
    static $instance;

    private $trainer; // Trainer
    private $message = "";
    private $wildPokemon = array(); // Array to store WildPokemon

    /**
     * @return World object - this is a Singleton.
     * Note with languages such as PHP that load everything on each request
     * Singleton not as important...
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new World();
        }
        return self::$instance;
    }

    /**
     * Used to reset the World (reset to null), for use with SESSION management (see getPokemon.php)
     */
    public static function reset()
    {
        self::$instance == null;
    }

    private function __construct()
    {
        $this->trainer = new Trainer('Gary', 'gary.png', 49.159706, -123.907757);
    }
    public function getTrainer()
    {
        return $this->trainer;
    }

    // Also required for Singleton
    private function __clone()
    {
    }

    /**
     * @return array of the Wild Pokemon in the world.
     */
    public function getWildPokemon()
    {
        $wildys = "";
        $wildys = "<br><h2>Wildy Pokes</h2>";
        $wildys .= "<br><table id=pokemon border='1'>";
        $wildys .= "<tr><th>Name</th><th>Image</th><th>Weight</th><th>HP</th><th>Latitude</th><th>Longitude</th><th>Type</th></tr>";
        foreach ($this->wildPokemon as $wildy) {
            $wildys .= $wildy;
        }
        $wildys .= "</table>";
        return $wildys;
    }

    /**
     * @return array of the Trainer's pokemon
     */
    public function getTrainersPokemon()
    {
        return $this->trainer->printAll();
    }

    //removes the pokemon from their respective arrays when called.
    public function removeTPokemon(Pokemon $pokemon)
    {
        if (($key = array_search($pokemon, $this->trainer->pokedex)) !== false) {
            unset($this->trainer->pokedex[$key]);
        } else
            $this->trainer->pokedex = array_values($this->trainer->pokedex);
    }

    public function removeWPokemon(Pokemon $pokemon)
    {
        if (($key = array_search($pokemon, $this->wildPokemon)) !== false) {
            unset($this->wildPokemon[$key]);
        } else
            $this->wildPokemon = array_values($this->wildPokemon);
    }

    /**
     * Call this method before battle or getJSON to load the wild and trainer pokemon into the World
     */
    public function load()
    {
        $this->wildPokemon = $this->loadPokemon("wildPokemon.txt");

        $this->trainer->pokedex = $this->loadPokemon("trainerPokemon.txt");
    }

    /**
     * When called, this function will find the nearest wild Pokemon, move the Trainer and his Pokemon to this
     * location, and attack. See the image created by @matthewt for the flow chart (in the REW301_code repo)
     */
    protected $c = 0;
    public function battle()
    {
        $battletext = "";
        $this->addMessage("<br><br><b>Battle Round: " . ($this->c + 1) . "</b><br>");
        $this->c++;
        $this->addMessage("Battling... ");

        //if all wild pokemon have "passed out" a.k.a. have been removed from the $wildPokemon array, print out a message and return.
        if (count($this->wildPokemon) == 0) {
            $this->addMessage("<br><br><b><u>All wild pokemon are passed out!!!</u></b>");
            return;
        }

        //variable declarations needed for the battle.
        $nearestWild = null;
        $nearestDistance = 0;

        //loops through each wild pokemon and finds the current closest one
        foreach ($this->wildPokemon as $wild) {

            $distance = $this->distance(
                $this->trainer->getLatitude(),
                $this->trainer->getLongitude(),
                $wild->getLatitude(),
                $wild->getLongitude()
            );

            if ($nearestWild == null) {
                $nearestWild = $wild;
                $nearestDistance = $distance;
            } else if ($distance < $nearestDistance) {
                $nearestWild = $wild;
                $nearestDistance = $distance;
            }

        }
        $this->addMessage("Found the next nearest wild pokemon " . $nearestWild->getName() . "!!!");

        // update the Trainer's pokemon to the coordinates of the closest wild pokemon, also offsets each pokemon by a degree for easier visibility on the map.
        $offsetY = -0.003;
        $offsetX = 0.003;
        $offsetCount = 1;
        foreach ($this->trainer->getPokemon() as $tPoke) {
            // same idea - update the lat/long for each of the trainer's $tPoke
            $tPoke->setLatitude($nearestWild->getLatitude() + ($offsetY * $offsetCount));
            $tPoke->setLongitude($nearestWild->getLongitude() + ($offsetX * $offsetCount));
            $offsetCount++;
        }

        //updates the Trainers to the coordinates of the closest wild pokemon
        $this->trainer->setLatitude($nearestWild->getLatitude());
        $this->trainer->setLongitude($nearestWild->getLongitude());

        //loops through battling the wild pokemon until one dies and returns
        foreach ($this->trainer->getPokemon() as $tPoke) {
            $tPokeAlive = true;
            // checks to make sure the current selected pokemon isnt passed out
            if ($tPoke->getHp() > 0) {
                $tPokeAlive = true;
            } else {
                $tPokeAlive = false;
            }

            //while the current pokemon is awake, attack until one passes out.
            while ($tPokeAlive == true) {
                $battletext .= "<br>" . $this->trainer->getName() . "'s pokemon " . $tPoke->getNickname() . " attacking.<br>";
                $battletext .=$tPoke->attack($nearestWild);

                //if the wild pokemon survives the attack, it attacks back.
                if ($nearestWild->getHp() > 0) {
                    $battletext .= "<br>Wild Pokemon " . $nearestWild->getNickname() . " Attacking.<br>";
                    $battletext .= $nearestWild->attack($tPoke);
                    
                //if the wild pokemon passes out, remove it from the wild pokemon array and return    
                } else if ($nearestWild->getHp() <= 0) {
                    $battletext .= "<br><br><u>The wild pokemon " . $nearestWild->getNickname() . " has passed out!!!</u><br>";
                    $this->addMessage($battletext);
                    $this->removeWPokemon($nearestWild);
                    return;
                }

                //if the wild pokemon survives, and attakcs the current trainers pokemon so it passes out, change its $tPokeAlive value to false and add a passed out message to $battletext/.
                if ($tPoke->getHp() <= 0) {
                    $tPokeAlive = false;
                    $battletext .= "<br><br><u>" . $this->trainer->getName() . "'s Pokemon " . $tPoke->getNickname() . " has passed out!!!</u><br><br>";
                }
            }
        }
        $battletext .= "<hr>";
        //adds the report of the battle to the mesage box for JSON then returns.
        $this->addMessage($battletext);
        return;
    }

    /**
     * Helper function to calculate distance between two points
     *
     * @param $lat1 - first lat coord
     * @param $lon1 - first long coord
     * @param $lat2 - second lat coord
     * @param $lon2 - second long coord
     * @return float - distance in kilometers between the two coords
     */
    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));

        $dist = acos($dist);
        $dist = rad2deg($dist);

        $miles = $dist * 60 * 1.1515;

        // return value in kilometers – or maybe we want meters precision?
        return $miles * 1.609344;
    }

    /**
     * @param $message - Add a String message to send back with the next call to getJSON()
     */
    public function addMessage($message)
    {
        $this->message .= $message . "<br>";
    }

    //prints out the current status of the message in the JSON
    public function getMessage()
    {
        return $this->message;
    }

    public function clearMessage()
    {
        // reset the messeage that is sent with JSON back to blank
        $this->message = "";
    }

    /**
     * @return string - a valid JSON String containing a list of all the Trainer and Pokemon Google Map markers.
     */
    public function getJSON()
    {

        $markers = '{"markers": [';
   
        // loop through our array of wild pokemon and get the JSON data
        foreach ($this->wildPokemon as $wpoke) {
            $markers .= $wpoke->getJSON();
            $markers .= ', ';
        }

        //loop through the array of trainer pokemon and get the JSON data
        $length = count($this->trainer->pokedex);

        for ($count = 0; $count < $length; $count++) {
            $tpoke = $this->trainer->pokedex[$count];
            $markers .= $tpoke->getJSON();

            if ($count < $length - 1) {
                $markers .= ', ';
            }
        }

        //adds the JSON data for the trainer to the array.
        $markers .= ', ' . $this->trainer->getJSON();

        //closes the markers tag and adds the message variable to the JSON data
        $markers .= '], "message": "' . $this->getMessage() . '"';

        //adds both the tabled data for the wild pokemon and the trainer pokemon to the JSON data as two different fields.
        $markers .= ', "wilddata": "' . $this->getWildPokemon() . '"';
        $markers .= ', "teamdata": "' . $this->getTrainersPokemon() . '"}';

        //returns added markers.
        return $markers;
    }

    /**
     * Function to load Pokemon objects from a csv file
     *
     * @param $filename
     * @return array containing Pokemon objects
     */
    public function loadPokemon($filename)
    {
        // $filename gets passed in, it will contain something like "wildPokemon.txt"

        // Read the file in and convert to a set of lines
        $lines = file($filename);

        // create a blank array that we will add to each line we go through
        $pokemons = array();

        // Cycle through the array which will return each line
        foreach ($lines as $line) {

            // Parse the line, retrieving the variables
            list($name, $weight, $hp, $lat, $long, $nickname) = explode(",", $line);

            // Remove newline from all variables if you need to
            $name = trim($name);
            $weight = trim($weight);
            $hp = trim($hp);
            $lat = trim($lat);
            $long = trim($long);
            $nickname = trim($nickname);

            // Create a new Pokemon object using the name of the class we read in
            // and the other four variables
            $pokemon = new $name($name, $weight, $hp, $lat, $long, $nickname);

            // we need to add this to the array of pokemon
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }
}
