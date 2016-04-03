<?php



class View
{
   
    private $file;
    private $data;
    private $twig;

    public function __construct($file, $data = null)
    {
        $this->file = $file;
        $this->data = $data;

        $twigLoader = new Twig_Loader_Filesystem('../app/views', '__main__');
        $this->twig = new Twig_Environment($twigLoader,
            [
                
            ]);
        $this->twig->addGlobal('ASSET_ROOT', '/');
        $this->twig->addGlobal('HTTP_ROOT', '/');
    }


    public function __toString()
    {
        return $this->parseView();
    }


    public function parseView()
    {
        $file = $this->file . '.php';

        try
        {
            if(is_null($this->data))
            {
                return $this->twig->render($file);
            }

            return $this->twig->render($file, $this->data);
        }

        catch(Twig_Error_Loader $e)
        {
            return $this->getErrorMessage('loader', $e->getMessage());
        }

        catch(Twig_Error_Runtime $e)
        {
            return $this->getErrorMessage('runtime', $e->getMessage());
        }

        catch(Twig_Error_Syntax $e)
        {
            return $this->getErrorMessage('syntax', $e->getMessage());
        }
    }

    private function getErrorMessage($errorType, $errorMessage)
    {
        return sprintf("A %s error occured: %s", $errorType, $errorMessage);
    }
} 
