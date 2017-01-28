<?php

namespace Forge\Modules\YOUR_FORGE_MODULE_NAME;

use \Forge\Loader;
use \Forge\Core\Abstracts\Module;
use \Forge\Core\App\API;
use \Forge\Core\App\App;
use \Forge\Core\App\Auth;

use function \Forge\Core\Classes\i;

class YOUR_FORGE_MODULE_NAME extends Module {
    private $permission = 'manage.forge-YOUR_FORGE_MODULE_NAME';

    public function setup() {
        $this->version = '0.0.1';
        $this->id = "forge-YOUR_FORGE_MODULE_NAME";
        $this->name = i('YOUR_MODULE_TITLE', 'forge-YOUR_FORGE_MODULE_NAME');
        $this->description = i('YOUR_MODULE_DESCRIPTION', 'forge-YOUR_FORGE_MODULE_NAME');
        $this->image = $this->url().'assets/images/module-image.png';
    }

    public function start() {
        Auth::registerPermissions($this->permission);
        // Add more specific permissions here

        // Load your Module
        Loader::instance()->loadDirectory(MOD_ROOT."forge-YOUR_FORGE_MODULE_NAME/classes/");
        Loader::instance()->loadDirectory(MOD_ROOT."forge-YOUR_FORGE_MODULE_NAME/views/");


        // backend
        Loader::instance()->addStyle("modules/forge-YOUR_FORGE_MODULE_NAME/assets/css/forge-YOUR_FORGE_MODULE_NAME.less");
        Loader::instance()->addScript("modules/forge-YOUR_FORGE_MODULE_NAME/assets/scripts/forge-YOUR_FORGE_MODULE_NAME.js");

        // frontend
        App::instance()->tm->theme->addScript($this->url()."assets/scripts/forge-YOUR_FORGE_MODULE_NAME.js", true);
        App::instance()->tm->theme->addStyle(MOD_ROOT."forge-YOUR_FORGE_MODULE_NAME/assets/css/forge-YOUR_FORGE_MODULE_NAME.less");

        // Register a callback for API-Requests
        API::instance()->register('forge-YOUR_FORGE_MODULE_NAME', array($this, 'apiAdapter'));
    }

    public function apiAdapter($data) {
        switch ($data['query'][0]) {
            case 'YOUR_INTERFACE_NAME_1':
                // EXECUTE RESPONSE
            break;
            case 'YOUR_INTERFACE_NAME_2':
                // EXECUTE RESPONSE
            break;
            default:
                return false;
        }
    }
}

?>
