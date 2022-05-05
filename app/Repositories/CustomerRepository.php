<?php

namespace App\Repositories;


use App\Models\LogActivity;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Carbon;

/**
 * Class CustomerRepository
 * @package App\Repositories
 * @version March 20, 2022, 11:27 am UTC
*/

class CustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'avatar', 'provider_id', 'provider',
        'access_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
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
    public function getActivity(string $chartLabel, string $activityType, string $barType){

        $logs = LogActivity::select('id', 'created_at')->where('activity', $activityType)->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $logsMonthCount = [];
        $userArr = [];

        foreach($logs as $key => $value){
            $logsMonthCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($logsMonthCount[$i])){
                $userArr[$i] = $logsMonthCount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $type = $barType;
        $label = 'Number of User ' . $chartLabel . ' Per Month';

        return [array_values(($userArr)), $months, $type, $label];
    }
}
