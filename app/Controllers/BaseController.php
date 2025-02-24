<?php

namespace App\Controllers;

use App\Models\AccountsModel;
use App\Models\DegreeModel;
use App\Models\DepartmentCategoryModel;
use App\Models\DepartmentModel;
use App\Models\ExtensionModel;
use App\Models\GenderModel;
use App\Models\LogsModel;
use App\Models\PlantillaModel;
use App\Models\RoleModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    protected $data = []; // Store global data
    protected $islogged;
    protected $accountid;

    public function __construct()
    {
        $this->loadAccountDetails();
        $this->loadNotifications();
        $this->loadModels();
        $this->loadDateTime();
    }

    private function loadAccountDetails()
    {
        $this->islogged = session()->get('is_logged');

        // [ User Details ]
        if ($this->islogged) {
            $this->accountid = session()->get('logged_id');

            $accountsModel = new AccountsModel();
            $this->data['user'] = $accountsModel->getUserInformation($this->accountid);
        }
    }

    private function loadNotifications()
    {
        // [ Notifications ]
        if ($this->islogged) {
            $logsModel = new LogsModel();
            $this->data['notifcount'] = $logsModel->CountNotification();
            $this->data['hasnotif'] = $logsModel->CheckNotification();
            $this->data['requests'] = $logsModel->LatestNotification('accounts');

            $accountsModel = new AccountsModel();
            $this->data['analytics'] = $accountsModel->analyticsData();
        }
    }

    private function loadModels()
    {
        // [ Department ]
        $departmentModel = new DepartmentModel();
        $this->data['departments'] = $departmentModel->getDepartments();

        // [ Department Category ]
        $departmentcategoryModel = new DepartmentCategoryModel();
        $this->data['departmentcategories'] = $departmentcategoryModel->orderBy('department_category_name', 'ASC')->findAll();

        // [ Plantilla ]
        $plantillaModel = new PlantillaModel();
        $this->data['plantillas'] = $plantillaModel->orderBy('plantilla_title', 'ASC')->findAll();

        // [ Role ]
        $roleModel = new RoleModel();
        $this->data['roles'] = $roleModel->findAll();

        // [ Genders ]
        $genderModel = new GenderModel();
        $this->data['genders'] = $genderModel->findAll();

        // [ Extensions ]
        $extensionModel = new ExtensionModel();
        $this->data['extensions'] = $extensionModel->findAll();

        // [ Degree ]
        $degreeModel = new DegreeModel();
        $this->data['degrees'] = $degreeModel->findAll();

    }

    private function loadDateTime()
    {
        // [ Date Time ]
        $this->data['timenow'] = Time::now()->toTimeString(); // e.g., "15:45:30"
        $this->data['datenow'] = Time::today()->toDateString(); // e.g., "2024-10-29"

        $this->data['timenow_stamp'] = Time::now()->getTimestamp();

        // Note:
        // Go to App/Config/App
        // Change this line on preferred timezone
        // Line: public string $appTimezone = 'UTC';
        // Timezones: https://www.php.net/manual/en/timezones.php
    }


    protected function setData(array $extraData)
    {
        $this->data = array_merge($this->data, $extraData);
    }

}

