<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require("/home/vcap/app/htdocs/vendor/autoload.php");
require("/home/vcap/app/htdocs/application/models/ustream_api.php");

class Dashboard extends CI_Controller {
     public function __construct() {
        parent::__construct();

        $this->load->model('User_m');


    }
    public function index()
    {
    	if($this->session->userdata('user_data') != null){


            $view['users']=$this->User_m->count();

            $pagename['pagename'] = "Dashboard";

            $this->load->view('include/header.php',$pagename);
            $this->load->view('index.php',$view);
            $this->load->view('include/footer.php');
        }
        else{
            $this->load->view('login');
        }
    }
    public function ustream2()
    {
      $client = new \GuzzleHttp\Client();
      // echo "--------------------------\n";
      // echo "----- Authentication --------\n";
      // echo "--------------------------\n";
      $auth_token = login($client);
      $channel_ids = getChannels($client, $auth_token);
      $videos=getVideoes($client, $auth_token, $channel_ids[0]);
      $channelDetails=getChannelsDetails($client,$auth_token,$channel_ids[0]);
      print_r($videos);
    //echo '<iframe src="'.$videos->videos[0]->url.'" style="border: 0 none transparent;"  webkitallowfullscreen allowfullscreen frameborder="no" width="720" height="405"></iframe><a href="http://www.ustream.tv/" title="Stream live video with Ustream" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: left;" target="_blank">Stream Live Video</a>';

          //  echo '<iframe style="position: absolute; top: 0; left: 0;" src="" allowfullscreen="" frameborder="0" height="50%" width="50%"></iframe>';


                  echo '<video width="400" controls>
                        <source src="https://www.ustream.tv/embed/recorded/'.$videos->videos[0]->id.'/highlight/'.$channel_ids[0].'?html5ui" >

                      </video>';

    }
    public function ustream(){
      if($this->session->userdata('user_data') != null){

        $client = new \GuzzleHttp\Client();
        $auth_token = login($client);
        $channel_ids = getChannels($client, $auth_token);
        $videos=getVideoes($client, $auth_token, $channel_ids[0]);
        $channelDetails=getChannelsDetails($client,$auth_token,$channel_ids[0]);

        $data['channelID']=$channel_ids[0];
        $data['channelName']=$channelDetails->channel->title;
        $data['videos']=$videos;
        $data['liveLink']='http://www.ustream.tv/embed/'.$channel_ids[0].'?html5ui';

        $pagename['pagename'] = "ustream";

        $this->load->view('include/header.php',$pagename);
        $this->load->view('ustream/index.php',$data);
        $this->load->view('include/footer.php');
    }else{
          $this->load->view('login');
      }
    }

}
