<?php
function is_super(){
    $ci = &get_instance();
    $role = $ci->session->userdata('admin_level');
    if($role=='Super Admin')
        return true; 
    else 
        return false;
}

function role($id){
    $ci = &get_instance();
    $role = $ci->session->userdata('admin_level');
    $admin_id = $ci->session->userdata('admin_id');
    if($role=='superadmin' && $admin_id!=$id)
        return 1; 
    else 
        return 2;
}

function prev_next($url, $id, $tbl){
    $ci = &get_instance();
    $ci->db->limit(1);
    $ci->db->select('id');
    $ci->db->order_by('id', 'desc');
    $q1 = $ci->db->get_where($tbl, array('id <'=>$id));
    $r1 = $q1->row();
    if ($r1)
        echo '<a href="'.site_url("{$url}/{$r1->id}").'" class="btn btn-primary" title="Previous">Previous</a> ';

    $ci->db->limit(1);
    $ci->db->select('id');
    $q2 = $ci->db->get_where($tbl, array('id >'=>$id));
    $r2 = $q2->row();
    if ($r2)
        echo '<a href="'.site_url("{$url}/{$r2->id}").'" class="btn btn-primary" title="Next">Next</a> ';
}

function get_age($birthDate)
{
    $birthDate = explode("/", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
    return $age;
}

function flash()
{
    $ci = &get_instance();
    if($ci->session->flashdata('info')) {
        echo
            '<div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            .$ci->session->flashdata('info').
            '</div>';
    }
    else if($ci->session->flashdata('success')) {
        echo
            '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            .$ci->session->flashdata('success').
            '</div>';
    }
    else if($ci->session->flashdata('fail')) {
        echo
            '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            .$ci->session->flashdata('fail').
            '</div>';
    }
}

function search_flash($message)
{
    echo '<div class="alert alert-info alert-dismissible" role="alert">' . $message . '</div>';
}

function user_flash()
{
    $ci = &get_instance();
    if($ci->session->flashdata('info')) {
        echo
            '<div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            .$ci->session->flashdata('info').
            '</div>';
    }
    else if($ci->session->flashdata('success')) {
        echo
            '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            .$ci->session->flashdata('success').
            '</div>';
    }
    else if($ci->session->flashdata('fail')) {
        echo
            '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            .$ci->session->flashdata('fail').
            '</div>';
    }
}

function check_user()
{
    $ci = &get_instance();
    return ($ci->session->userdata('current_user')) ? $ci->session->userdata('current_user') : false;
}

function get_user_by_email($email)
{
    $ci = &get_instance();
    $q = $ci->db->get_where('tbl_user', array('email' => $email))->result_array();
    if($q)
        return $q[0];
    else
        return false;
}

function check_email($email)
{
    $ci = &get_instance();
    $ci->db->limit(1);
    $ci->db->select('email');
    $q = $ci->db->get_where('tbl_user', array('email'=>$email));
    if($q->row())
        echo 1;
    else
        echo 0;
}

function sendemail($params)
{
    $config = Array(
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );
    //Filtering @params
    $params['from_name'] = (!isset($params['from_name'])) ? '' : $params['from_name'];
    $params['replytoname'] = (!isset($params['replytoname'])) ? '' : $params['replytoname'];

    $ci = &get_instance();
    if (isset($params['dontlog']) && $params['dontlog'] == true) {
        
    } else {
        $ci->load->model('admin/emaillogs_model','emaillogs_model',true);
        $data = array(
            'email_subject' => $params['subject'],
            'sent_by'       => $params['from'],
            'sent_to'       => $params['sendto'],
            'sent_date'     => date('Y-m-d H:i:s'),
            'email_content' => $params['message'],
            'status'        => 1
        );
        if (isset($params['initiatedBy'])) {
            $data['initiatedId']    =  $params['initiatedBy']['id'];
            $data['initiatedEmail'] =  $params['initiatedBy']['email'];
        }
        if (isset($params['attachment'])) {
            $data['full_path']    =  $params['attachment']['file_name'];
        }
        $ci->emaillogs_model->addEmailLog($data);
    }
    //Loading email library
    $ci->load->library('email',$config);
    $mail = $ci->email;
    //$mail->initialize(array('mailtype' => 'html'));
    $mail->set_newline("\r\n");
    //Set who the message is to be sent from
    $mail->from($params['from'], $params['from_name']);

    //Set an alternative reply-to address
    $mail->reply_to($params['replyto'], $params['replytoname']);

    //Set who the message is to be sent to
    $mail->to($params['sendto']);

    if(isset($params['bcc'])) {
        //Set the BCC address
        $mail->bcc($params['bcc']);
    }

    if(isset($params['cc'])) {
        //Set the CC address
        $mail->bcc($params['cc']);
    }
    
    if(isset($params['attachment'])) {
        $mail->attach($params['attachment']['full_path']);
    }

    //Set the subject line
    $mail->subject($params['subject']);

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->message($params['message']);

    //send the message, check for errors
    if (!$mail->send()) {
        //echo $mail->print_debugger();die;
    } else {
        return true;
    }
}

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

function get_user($id)
{
    $ci = &get_instance();
    $q = $ci->db->get_where('tbl_user', array('id' => $id))->result_array();
    if($q)
        return $q[0];
    else
        return false;
}
function get_user2($id)
{
    $ci = &get_instance();
    $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.id = $id";
    $result = $ci->db->query($sql);        
    return $result->result_array();
}
function get_userprofile($id){
    $ci = &get_instance();
    $q = $ci->db->get_where('tbl_userprofile', array('id' => $id))->result_array();
    if($q)
        return $q[0];
    else
        return false;
}

function segment($seg)
{
    $ci = &get_instance();
    return $ci->uri->segment($seg);
}

function get_care_detail($care_type)
{
    $ci = &get_instance();
    $q = $ci->db->get_where('tbl_care', array('id' => $care_type))->result_array();
    return $q[0];
}

function get_care($type)
{
    $ci = &get_instance();
    $ci->db->order_by('service_by ASC');
    $q = $ci->db->get_where('tbl_care', array('service_type'=>$type))->result_array();
    return $q;
}

function get_unread_ticket_count(){
    $ci = &get_instance();
    $ci->db->like('view', '0');
    $ci->db->from('tbl_tickets_history');
    return $ci->db->count_all_results();        
}

function encrypt_decrypt($action, $string) {
    $output = false;

    $key = '!@#$%^&*';

    // initialization vector
    $iv = md5(md5($key));

    if( $action == 'encrypt' ) {
        $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
        $output = rtrim($output, "");
        $output = strip_tags($output);
    }
    return $output;
}

function home_flash()
{
    $ci = &get_instance();
    if($ci->session->flashdata('msg')) {
        echo '<script>$.jGrowl("'.$ci->session->flashdata('msg').'")</script>';
    }
}
function get_care_type($id)
{
    $ci = &get_instance();
    $q = $ci->db->get_where('tbl_care', array('id'=>$id));
    return $q->row();
}

function get_account_details()
{
    $ci = &get_instance();
    $ci->db->select('care_type, account_category');
    $q = $ci->db->get_where('tbl_userprofile', array('user_id'=> check_user()));
    return $q->row();
}

function get_account_category(){
    $ci = &get_instance();
    $ci->db->where('id',$ci->session->userdata('current_user'));
    $ci->db->select('account_category');
    $query = $ci->db->get('tbl_user');
    return $query->row();
}

function getCare($care_type,$service_by)
{
    $ci = &get_instance();
    $q = $ci->db->get_where('tbl_care', array('service_type' => $care_type,'service_by'=>$service_by))->result_array();
    return $q;
}
function print_rr($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}

function update_crm($user)
{
    $ci = &get_instance();
    $ci->load->library('activeCampaign');
    $ci->load->model('user_model');
    $tags = [];
    $serviceTags = [];
    $ac = $ci->activecampaign;
    $userProfiles = $ci->user_model->get_all_profile($user['id']);
    if (count($userProfiles) > 0) {
        foreach ($userProfiles as $userProfile) {
            if ($userProfile->profile_status == 1) {
                $tags[] = 'Profile Approved';
            }
            if ($userProfile->care_type < 11) {
                $tags[] = $ac->tags[1];
            } else if ($userProfile->care_type < 17) {
                $tags[] = $ac->tags[2];
            } else if ($userProfile->care_type < 25) {
                $tags[] = $ac->tags[3];
            } else {
                $tags[] = $ac->tags[4];
            }
            $serviceTags[] = $userProfile->service_name;
        }
        
     	if ($user['profile_picture_status'] == 1 && $user['profile_picture'] != '') {
     	    $tags[] = 'Photo Approved';
     	}
        $name = explode(' ', $user['name']);
        $contact = array(
    		"email"      => $user['email'],
    		"first_name" => array_shift($name),
    		"last_name"  => implode(' ', $name),
    		"p[6]"       => 6,
    		"status[6]"  => 1,
    		"tags"       => implode(',', array_merge($tags, $serviceTags)),     
    		"phone"     => $user['contact_number'],
    		"field[%LOCATION%]" => $user['location'],
    		"field[%COUNTRY%]" => $user['country']
     	);
     	
        return $ac->api("contact/sync", $contact);
    }
}

