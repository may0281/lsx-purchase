<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report extends CI_Controller {
    private $menu;
	public function __construct()
	{
//        error_reporting(0);
		parent::__construct();
		if($this->session->userdata('isSession') == false){
            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('report_model');
        $this->menu = 'Report';
        $this->weekly = 'Weekly Purchase Report';
        $this->major = 'report';
        $this->minor = 'weekly';
        $this->forecast = 'forecast-receive';
    }

	public function weekly()
	{
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) );
        
        $projects = $this->report_model->getProjectList();
        $i = 0;
        $all = array();
        foreach ($projects as $project)
        {
            $proj_id = $project['proj_id'];
            $itemList = $this->report_model->getItemTrackingByProject($proj_id,$monday,$sunday);
            if($itemList)
            {
                $data = array(
                    $i => array(
                        'proj_id' => $proj_id,
                        'proj_name' => $project['proj_name'],
                        'purchase' => $itemList
                    ),
                );
                $i++;
                $all = array_merge($all,$data);
            }

        }
        $data['project'] = $all;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->weekly;
        $data['startDate'] = $monday;
        $data['endDate'] = $sunday;
        $this->load->view('template/left');
        $this->load->view('report/weekly',$data);

	}

	public function forecastReceive()
	{
        $permission = $this->hublibrary_model->permission($this->major,$this->forecast,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $lastMonth = $this->weeks_in_month(date("m", strtotime('-1 months')),date("Y", strtotime('-1 months')));
        $currentMonth = $this->weeks_in_month(date("m"),date("Y"));
        $next1Month = $this->weeks_in_month(date("m", strtotime('+1 months')),date("Y", strtotime('+1 months')));
        $next2Month = $this->weeks_in_month(date("m", strtotime('+2 months')),date("Y", strtotime('+2 months')));


        $month = array(
            'lastMonth' => array(
                'month' => date("M,Y", strtotime('-1 months')),
                'weeks' => $this->prepareDate(array_get($lastMonth,'startWeek')-1,array_get($lastMonth,'endWeek')-1,date("Y", strtotime('-1 months')) ),
            ),
            'currentMonth' => array(
                'month' => date("M,Y"),
                'weeks' => $this->prepareDate(array_get($currentMonth,'startWeek')-1,array_get($currentMonth,'endWeek')-1,date("Y") ),
            ),
            'next1Month' => array(
                'month' => date("M,Y", strtotime('+1 months')),
                'weeks' => $this->prepareDate(array_get($next1Month,'startWeek')-1,array_get($next1Month,'endWeek')-1,date("Y", strtotime('+1 months')) ),
            ),
            'next2Month' => array(
                'month' => date("M,Y", strtotime('+2 months')),
                'weeks' => $this->prepareDate(array_get($next2Month,'startWeek')-1,array_get($next2Month,'endWeek')-1,date("Y", strtotime('+2 months')) ),
            ),
        );

        $itemList = $this->report_model->getItemAll();
        $i = 0;
        $itemAll = array();
        foreach ($itemList as $item)
        {
            $data = array(
                $i => array(
                    'item_code' => $item['item_code'],
                    'item_qty' => $item['item_qty'],
                    'dataList' => $this->report_model->purchase_order_item($item['item_code'])
                ),
            );
            $i++;
            $itemAll = array_merge($itemAll,$data);
        }


        $data['month'] = $month;
        $data['items'] = $itemAll;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->forecast;
        $this->load->view('template/left');
        $this->load->view('report/forecast-receive',$data);

	}

	protected function weeks_in_month($month, $year)
    {
        $start = mktime(0, 0, 0, $month, 1, $year);
        $end = mktime(0, 0, 0, $month, date('t', $start), $year);
        $start_week = date('W', $start);
        $end_week = date('W', $end);
        if ($end_week < $start_week) { // Month wraps
            return ((52 + $end_week) - $start_week) + 1;
        }
        $totalWeek =($end_week - $start_week) + 1;
        $data = array('startWeek'=> $start_week,'endWeek' => $end_week,'totalWeeks'=>$totalWeek);
        return $data;


    }
    public function prepareDate($startWeek, $endWeek,$year)
    {
        for($i=$startWeek; $i<$endWeek; $i++ )
        {
            $data[] = $this->getStartAndEndDate($i,$year);
        }

        return $data;
    }

    protected function getStartAndEndDate($week, $year)
    {

        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7*$week)+1-$day)*24*3600;
        $return['start'] = date('Y-n-j', $time);
        $time += 6*24*3600;
        $return['end'] = date('Y-n-j', $time);
        return $return;
    }

}