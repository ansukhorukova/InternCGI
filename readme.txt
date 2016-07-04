index.php - The file implements main app

autoloader.php - The file implements spl_autoload_register() function

./config/ConfigDataBase.php - The file contains information to login into DB

./config/ConfigPathToLogFile.php - The file contains path to writable logfile

./config/ConfigPathToLoggers.php - The file contains path to loggers files

./modules/database/ConnectToDataBase.php - The file implements connection to DB

./log - contains log file.

./modules - dir contains main files for works app


/**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->data['email'] = $email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->data['name'] = $name;
    }