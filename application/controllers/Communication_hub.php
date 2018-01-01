<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Communication_hub extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        define( 'API_ACCESS_KEY', 'AAAApj6zYT4:APA91bG7kikxGt7fnXaZhq5t28FcYM85FbPjL8V8yXOpXy56nYP80U4jZibFkCZG6FmSsCiazdUbwwTavQ-agqT-gs_tJUPyM15nft6YqaRhgO_vrAOzxj9u2JtkIXc-W0Vi_QRGGkgA' );

        $data['name']=$this->session->userdata('name');
        $data['login_id']=$this->session->userdata('login_id');

        $data['tincentives']=$this->home_model->total_incentives();
        $data['texam']=$this->home_model->total_exam();
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['tpso']=$this->home_model->total_pso($user_type,$employee_id);
        $data['tdrug']=$this->home_model->total_drug();
        $this->session->set_userdata('main_menu','communication');

        if($this->session->userdata('change_pass_status')=='0')
        {
            redirect(base_url().'change_password');
        }


        if($data['login_id']!=null)
        {

        }
        else
        {
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $this->session->set_userdata('sub_menu','send_message');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['regions'] = $this->pso_model->get_region();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->load->view('view_communication_hub/view_send_new_message', $data, TRUE);
        $this->load->view('view_master',$data);
    }

    public function send_message()
    {
        $this->session->set_userdata('sub_menu','send_message');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['regions'] = $this->pso_model->get_region();
        $data['psos'] = $this->pso_model->get_psos();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->load->view('view_communication_hub/view_send_new_message', $data, TRUE);
        $this->load->view('view_master',$data);
    }
    public function seemore_test()
    {
        $data['tests']=$this->home_model->getAlltest();
        $this->load->view('view_home/view_seemore_test',$data);
        $this->load->view('view_footer');
    }

    public function notification_push($token,$message_body,$message_title)
    {
        #API access key from Google API's Console
        $registrationIds = $token;

        #prep the bundle
        $msg = array
        (
            'body' 	=> $message_body,
            'title'	=> $message_title,
            'icon'	=> 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );
        $fields = array
        (
            'to'		=> $registrationIds,
            'notification'	=> $msg
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }
    public function universal_assignment()
    {
        $data['message_title']=$this->input->post('message_title');
        $data['message_body']=$this->input->post('message_body');
        $data['sent_by']=$this->input->post('sent_by');
        $data['reference']='communication_hub';
        $data['user_id']=$this->session->userdata('employee_id');
        $data['date']=date('Y-m-d');
        $data['time']=date("h:i:s");
        $data['status']='1';
        $business_code=$this->input->post('business_code');
        $psos = $this->communication_hub_model->get_pso_token_by_business($business_code);
        $notification_id=$this->communication_hub_model->add_notification($data);
        foreach ($psos as $pso)
        {
            $this->communication_hub_model->assign_notification($notification_id,$pso['pso_id']);
            $abc=$this->notification_push($pso['token'],$data['message_body'],$data['message_title']);
        }
        $this->session->set_userdata('send_message','Message Successfully Sent');

    }
    public function regional_assignment()
    {
        $data['message_title']=$this->input->post('message_title');
        $data['message_body']=$this->input->post('message_body');
        $data['sent_by']=$this->input->post('sent_by');
        $data['reference']='communication_hub';
        $data['user_id']=$this->session->userdata('employee_id');
        $data['date']=date('Y-m-d');
        $data['time']=date("h:i:s");
        $data['status']='1';
        $region=implode(',',$this->input->POST('region'));
        $psos = $this->communication_hub_model->get_pso_token_by_region($region);
        $notification_id=$this->communication_hub_model->add_notification($data);
        foreach ($psos as $pso)
        {
            $this->communication_hub_model->assign_notification($notification_id,$pso['pso_id']);
            $abc=$this->notification_push($pso['token'],$data['message_body'],$data['message_title']);
        }
        $this->session->set_userdata('send_message','Message Successfully Sent');

    }
    public function types_assignment()
    {
        $data['message_title']=$this->input->post('message_title');
        $data['message_body']=$this->input->post('message_body');
        $data['sent_by']=$this->input->post('sent_by');
        $data['reference']='communication_hub';
        $data['user_id']=$this->session->userdata('employee_id');
        $data['date']=date('Y-m-d');
        $data['time']=date("h:i:s");
        $data['status']='1';
        $psos=$this->input->POST('psos');
        $notification_id=$this->communication_hub_model->add_notification($data);
        foreach ($psos as $pso)
        {
            $pso_token = $this->communication_hub_model->get_pso_token_by_psos($pso);
            if($pso_token)
            {
                $this->communication_hub_model->assign_notification($notification_id,$pso_token->pso_id);
                $abc=$this->notification_push($pso_token->token,$data['message_body'],$data['message_title']);
            }
        }
        $this->session->set_userdata('send_message','Message Successfully Sent');

    }
    public function pso_assignment()
    {
        $data['message_title']=$this->input->post('message_title');
        $data['message_body']=$this->input->post('message_body');
        $data['sent_by']=$this->input->post('sent_by');
        $data['reference']='communication_hub';
        $data['user_id']=$this->session->userdata('employee_id');
        $data['date']=date('Y-m-d');
        $data['time']=date("h:i:s");
        $data['status']='1';
        $psos=$this->input->POST('pso');
        $notification_id=$this->communication_hub_model->add_notification($data);
        foreach ($psos as $pso)
        {
            $pso_token = $this->communication_hub_model->get_pso_token_by_pso($pso);

            if($pso_token)
            {
                $this->communication_hub_model->assign_notification($notification_id,$pso_token->pso_id);
                $abc=$this->notification_push($pso_token->token,$data['message_body'],$data['message_title']);
            }
        }
        $this->session->set_userdata('send_message','Message Successfully Sent');

    }
    public function view_message()
    {
        $this->session->set_userdata('sub_menu','view_message');
        $user_type=$this->session->userdata('user_type');
        if($user_type=='1'||$user_type=='2')
        {
            $data['messages']=$this->communication_hub_model->show_all_messages();
        }
        else
        {
            $data['messages']=$this->communication_hub_model->show_all_user_messages($this->session->userdata('employee_id'));
        }
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_communication_hub/view_message',$data,TRUE);
        $this->load->view('view_master',$data);
    }

}