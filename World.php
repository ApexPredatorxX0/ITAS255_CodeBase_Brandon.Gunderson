<?php

// croftd: since we registered an __autoload we shouldn't need to require these
//require_once "Paras.php";
//require_once "Pikachu.php";
//require_once "Bulbasaur.php";
//require_once "Pidgey.php";

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
        //return $this->wildPokemon->getPokemon();;
        echo "<br>Wildy Pokes";
        echo "<br><table id=pokemon border='1'>";
        echo "<tr><th>Name</th><th>Image</th><th>Weight</th><th>HP</th><th>Latitude</th><th>Longitude</th><th>Type</th></tr>";
        foreach ($this->wildPokemon as $wildy) {
            echo $wildy;
        }
        echo "</table>";
    }

    /**
     * @return array of the Trainer's pokemon
     */
    public function getTrainersPokemon()
    {
        return $this->trainer->getPokemon();
    }

    /**
     *
     */
    public function removeTPokemon(Pokemon $pokemon)
    {
        //unset($this->pokedex[$pokemon];
        if (($key = array_search($pokemon, $this->trainer->pokedex)) !== false) {
            unset($this->trainer->pokedex[$key]);
        } else
            $this->trainer->pokedex = array_values($this->trainer->pokedex);
    }

    public function removeWPokemon(Pokemon $pokemon)
    {
        //unset($this->pokedex[$pokemon];
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
        //$ash = new Trainer("Ash", "trainer.png", 144.34, 54.76);
        // croftd: added code to read first the file for wildPokemon,
        // and second the file for trainer's pokemon
        $this->wildPokemon = $this->loadPokemon("wildPokemon.txt");

        // This will only work, if Trainer class has a public variable 
        // called pokedex to store an array of Pokemon read from the file
        $this->trainer->pokedex = $this->loadPokemon("trainerPokemon.txt");
    }

    /**
     * When called, this function will find the nearest wild Pokemon, move the Trainer and his Pokemon to this
     * location, and attack. See the image created by @matthewt for the flow chart (in the REW301_code repo)
     */
    protected $c = 0;
    public function battle()
    {
        
        echo "<br><br><b>Battle Round: " . $this->c . "</b>";
        $this->c++;
        battleStart:
        $this->addMessage("Battling... ");
        if (count($this->wildPokemon) == 0) {
            echo "<br><br><b><u>All wild pokemon are passed out!!!</u></b>";
            return;
            
        }

        // Does nothing yet...
        $nearestWild = null;
        $nearestDistance = 0;

        foreach ($this->wildPokemon as $wild) {

            $distance = $this->distance(
                $this->trainer->getLatitude(),
                $this->trainer->getLongitude(),
                $wild->getLatitude(),
                $wild->getLongitude()
            );

            // the first time through, we will assume this distance is the closest one, as we haven't checked the others...
            if ($nearestWild == null) {
                $nearestWild = $wild;
                $nearestDistance = $distance;
            } else if ($distance < $nearestDistance) {
                //$wild = $nearestDistance;
                $nearestWild = $wild;
                $nearestDistance = $distance;
            }

            // the next time through, you'll need an else if statement to check if the next $wild's distance is less than $nearestDistance, and if so set this as $nearestWild
        }
        $this->addMessage("Found the next nearest wild pokemon: " . $wild->getName());

        // update the Trainer and the Trainer's pokemon to these co-ordinates
        $this->trainer->setLatitude($nearestWild->getLatitude());
        $this->trainer->setLongitude($nearestWild->getLongitude());

        foreach ($this->trainer->getPokemon() as $tPoke) {
            // same idea - update the lat/long for each of the trainer's $tPoke
            $tPoke->setLatitude($nearestWild->getLatitude());
            $tPoke->setLongitude($nearestWild->getLongitude());
            // etc...
        }

        foreach ($this->trainer->getPokemon() as $tPoke) {
            $tPokeAlive = true;
            // attack the current wild pokemon
            if ($tPoke->getHp() > 0) {
                $tPokeAlive = true;
            } else {
                $tPokeAlive = false;
            }
            /*           if ($nearestWild->getHp() > 0) {
                $nearestAlive = true;
            } else {
                $nearestAlive = false;
            } */
            $i = 0;
            while ($tPokeAlive == true && $i < 10) {
                $i++;
                echo "<br>Trainer pokemon " . $tPoke->getNickname() . " attacking.";
                $tPoke->attack($nearestWild);
                $this->addMessage("Trainer_" . $tPoke->getNickname() . " attacked Wild_" . $nearestWild->getNickname() . " HP:" . $nearestWild->getHp());

                // if $nearestWild has getHitPoint() > 0, then let the nearest wild attack $tPoke
                if ($nearestWild->getHp() > 0) {
                    echo "<br>Wild Pokemon " . $nearestWild->getNickname() . " Attacking.";
                    $nearestWild->attack($tPoke);
                } else if ($nearestWild->getHp() <= 0) {
                    echo "<br><br><u>The wild pokemon " . $nearestWild->getNickname() . " has passed out!!!</u><br>";
                    $this->removeWPokemon($nearestWild);
                    //goto battleStart;
                    //exit;
                    //continue;
                    //die;
                    return;
                }

                // etc. etc.. you will have to translate my directions above into working code!
                if ($tPoke->getHp() <= 0) {
                    $tPokeAlive = false;
                    echo "<br><br><u>" . $this->trainer->getName() . "'s Pokemon " . $tPoke->getNickname() . " has passed out!!!</u><br><br>";
                    $this->removeTPokemon($tPoke);
                }
            }
        }
        
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
        $this->message = $this->message . ", " . $message;
    }

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
     *
     * The format should look like:
     *
     * <pre>
     *
     *{"markers": [{"lat":  49.159720,"long":  -123.907773,"name": "Paras","image": "paras.jpg" },{"lat":  49.171154,"long":  -123.971443
     * ,"name": "Pidgey","image": "pidgey.jpg" },{"lat":  49.152864,"long":  -123.94873
     * ,"name": "Paras","image": "paras.jpg" },{"lat":  49.1350026,"long":  -123.9220046
     * ,"name": "Paras","image": "paras.jpg" },{"lat":  49.178561,"long":  -123.857631
     * ,"name": "Bulbasaur","image": "bulbasaur.jpg" },{"lat":  49.162736,"long":  -123.892478
     * ,"name": "Bulbasaur","image": "bulbasaur.jpg" },{"lat":  49.1790103,"long":  -123.9199447
     * ,"name": "Pidgey","image": "pidgey.jpg" },{"lat":  49.1675630,"long":  -123.9383125,"name": "Pidgey","image": "pidgey.jpg" } ],
     * "message": "BattleCount[9] Server Messages: Trainer starting with pokemon index"}
     *
     * </pre>
     */
    public function getJSON()
    {

        $markers = '{"markers": [';

        //echo "Creating Wild Pokemon JSON";    
        // loop through our array of wild pokemon and get the JSON data
        foreach ($this->wildPokemon as $wpoke) {
            $markers .= $wpoke->getJSON();
            $markers .= ', ';
            //echo "Added JSON for poke";
        }
        //$markers .= '</br> "Wildy Bois Printed" </br></br>';

        $length = count($this->trainer->pokedex);

        for ($count = 0; $count < $length; $count++) {
            $tpoke = $this->trainer->pokedex[$count];
            echo $count;
            $markers .= $tpoke->getJSON();

            if ($count < $length - 1) {
                $markers .= ', ';
            }
        }
        //$markers .= '</br> "Caught Bois Printed" </br></br>';

        $markers .= ', ' . $this->trainer->getJSON();
        //$markers .= '</br> "Ya Boi Printed" </br></br>';


        $markers .= '], "message": "' . $this->getMessage() . '"}';

        return $markers;
    }

    /**
     * Function to load Pokemon objects from a csv file
     * 
     * WRITE YOUR CODE FOR STEP9 HERE - This function should return an array
     *
     * @param $filename
     * @return array containing Pokemon objects
     */
    public function loadPokemon($filename)
    {
        // $filename gets passed in, it will contain something like "wildPokemon.txt"
        // croftd: currently does nothing

        // Read the file in and convert to a set of lines
        $lines = file($filename);

        // create a blank array that we will add to each line we go through
        $pokemons = array();

        // Cycle through the array which will return each line
        foreach ($lines as $line) {

            // Parse the line, retrieving the variables
            list($name, $weight, $hp, $lat, $long, $nickname) = explode(",", $line);

            echo "<br>Checking this worked, here is name: " . $nickname;
            // Remove newline from $name if you need to
            $name = trim($name);

            // Create a new Pokemon object using the name of the class we read in
            // and the other four variables
            $pokemon = new $name($name, $weight, $hp, $lat, $long, $nickname);

            // we need to add this to the array of pokemon
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }
}
