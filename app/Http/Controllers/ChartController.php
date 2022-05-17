<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\Order;
use App\Models\User;
use App\Repositories\CustomerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Carbon;
use Response;

class ChartController extends AppBaseController
{
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the Customer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $this->getUserAdmin('Admin and User Count', 'pie');
        return view('customers.statistics')->with(['data' => $data]);
    }

    /**
     * Return statistic type based on selection
     *
     * @param Request $request
     * @return mixed
     */
    public function changeStatisticType(Request $request)
    {
        switch ($request->statisticType) {
            case "registerPerMonth":
                $data = $this->getUserActivity('Registrations', 'Registered', 'line');
                break;
            case "loginPerMonth":
                $data = $this->getUserActivity('Logins', 'Logged in', 'line');
                break;
            case "userAdminCount":
                $data = $this->getUserAdmin('Administrator User Count', 'pie');
                break;
            case "paidOrders":
                $data = $this->getOrderActivity('Paid', 'line');
                break;
            case "unpaidOrders":
                $data = $this->getOrderActivity('Unpaid', 'line');
                break;
            case "cancelledOrders":
                $data = $this->getOrderActivity('Cancelled', 'line');
                break;
            default:
                break;
        }

        return Response::json(['data' => $data]);
    }

    /**
     * Returns user activity by month, chartLabel is used in ex: Number of User 'chartLabel' Per Month.
     * activityType is a type for database query in log_activities -> activity. barType ex: line,bar,pie.
     *
     * @param string $chartLabel
     * @param string $activityType
     * @param string $barType
     * @return array
     */
    public function getUserActivity(string $chartLabel, string $activityType, string $barType): array
    {

        $logs = LogActivity::select('id', 'created_at')->where('activity', $activityType)->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $logsMonthCount = [];
        $userArr = [];

        foreach ($logs as $key => $value) {
            $logsMonthCount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($logsMonthCount[$i])) {
                $userArr[$i] = $logsMonthCount[$i];
            } else {
                $userArr[$i] = 0;
            }
        }

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $type = $barType;
        $label = 'Number of User ' . $chartLabel . ' Per Month';

        return [array_values(($userArr)), $months, $type, $label];
    }

    /**
     * Get Orders by Activity Paid,Unpaid,Cancelled by created_date
     * Return Array consists of [data,lineLabels,barType,chartLabel]
     *
     * @param string $activityType
     * @param string $barType
     * @return array
     */
    public function getOrderActivity(string $activityType, string $barType): array
    {

        if($activityType == 'Paid') {
            $queryType = [2, 3, 4];
        }
        elseif($activityType == 'Unpaid') {
            $queryType = [1];
        }
        else {
            $queryType = [5];
        }

        $orders = Order::select('id', 'created_at')->whereIn('status_id', $queryType)->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });


        $ordersMonthCount = [];
        $ordersArr = [];

        foreach ($orders as $key => $value) {
            $ordersMonthCount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($ordersMonthCount[$i])) {
                $ordersArr[$i] = $ordersMonthCount[$i];
            } else {
                $ordersArr[$i] = 0;
            }
        }

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $type = $barType;
        $label = 'Number of ' . $activityType . ' Orders Per Month';
        return [array_values(($ordersArr)), $months, $type, $label];
    }

    /**
     * Get Users and Admins from database to Chart
     * Return Array consists of [data,lineLabels,barType,chartLabel]
     *
     * @param string $chartLabel
     * @param $barType
     * @return array
     */
    public function getUserAdmin(string $chartLabel, $barType): array
    {
        $users = User::where('type', 2)->count();
        $admins = User::where('type', 1)->count();


        $data = [$admins,$users];

        $lineLabels = ['Administrators', 'Users'];

        return [array_values(($data)),$lineLabels, $barType, $chartLabel];
    }
}
