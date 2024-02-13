<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {



public function sales_report($group='',$cat='',$date, $sr_id='')
{
    $this->db->select('s.*, s.price,p.group,s.date as date,p.cat');
    $this->db->from('sales'.' as s');
    $this->db->join('products'.' as p', 'p.id = s.pid', 'left');
    if($date != NULL) {
        $this->db->like('s.date', $date);
    }if($group != NULL) {
    $this->db->where('p.group', $group);    
    }if($cat != NULL) {
    $this->db->where('p.cat', $cat);
    }    
    if($sr_id != NULL) {
    $this->db->where('s.sr_id', $sr_id);
    }
  //  $this->db->select_sum('s.price');
  //  $this->db->select_sum('s.commission');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
}


public function purchase_report($group='',$cat='',$date)
{
    $this->db->select('p.*,pr.group,pr.cat,pr.type');
    $this->db->from('purchase'.' as p');
    $this->db->join('products'.' as pr', 'pr.id = p.pid', 'left');
    if($date != NULL) {
        $this->db->like('p.date', $date);
    }if($group != NULL) {
    $this->db->where('pr.group', $group);    
    }if($cat != NULL) {
    $this->db->where('pr.cat', $cat);
    }  
  //  $this->db->select_sum('s.price');
  //  $this->db->select_sum('s.commission');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
}





function this_month_purchase($group,$cat,$date) {
    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    $this->db->select('p.*,pr.group,pr.cat,pr.type');
    $this->db->from('purchase'.' as p');
    $this->db->join('products'.' as pr', 'pr.id = p.pid', 'left');
    if($date != NULL) {
        $this->db->like('p.date', $date);
    }if($group != NULL) {
    $this->db->where('pr.group', $group);    
    }if($cat != NULL) {
    $this->db->where('pr.cat', $cat);
    }     
    $this->db->select_sum('p.price');
    $this->db->select_sum('p.commission'); 
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


function this_month_sales($group,$cat,$date) {
    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    $this->db->select('s.*,pr.group,pr.cat,pr.type');
    $this->db->from('sales'.' as s');
    $this->db->join('products'.' as pr', 'pr.id = s.pid', 'left');
    if($date != NULL) {
        $this->db->like('s.date', $date);
    }if($group != NULL) {
    $this->db->where('pr.group', $group);    
    }if($cat != NULL) {
    $this->db->where('pr.cat', $cat);
    }     
    $this->db->select_sum('s.price');
    $this->db->select_sum('s.commission'); 
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }



















function this_month_sim_lifting($group,$date) {
	if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
	} else {
		$today = $date;
	}
    $this->db->from('sim');    
    $this->db->where('group', $group);
    $this->db->like('date', $today);
    $this->db->select_sum('amount');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }

function this_month_sim_cash_sales($group,$date) {
	if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
	} else {
		$today = $date;
	}
    $this->db->from('sim_sales');
    $this->db->like('group', $group);
    $this->db->like('date', $today);
    $this->db->select_sum('amount');
    $this->db->select_sum('commission');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }



function this_month_card_lifting($group,$date) {
	if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
	} else {
		$today = $date;
	}
    $this->db->from('scratch_card');    
    $this->db->where('group', $group);
    $this->db->like('date', $today);
    $this->db->select_sum('amount');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


function this_month_card_sales($group,$date) {
	if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
	} else {
		$today = $date;
	}
    $this->db->from('card_sales');    
    $this->db->where('group', $group);
    $this->db->like('date', $today);
    $this->db->select_sum('amount');
    $this->db->select_sum('commission');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


//========================= Total Lifting --========================================================

function total_disbursment($date){
    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    $this->db->from('cash');    
    $this->db->where('type', 'Disbursment');
    $this->db->like('date', $today);
    $this->db->select_sum('debit');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }



function total_lifting($group, $date) {
    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    if($group == 'load') {        
    $this->db->from('load');  
    } if($group == 'SIM') {        
    $this->db->from('sim');  
    } if($group == 'card') {        
    $this->db->from('scratch_card');  
    }  
    $this->db->like('date', $today);
    $this->db->select_sum('amount');
    $this->db->select_sum('commission');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


function total_sales($group, $date) {
    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    if($group == 'load') {        
    $this->db->from('load_sales');  
    } if($group == 'SIM') {        
    $this->db->from('sim_sales');  
    } if($group == 'card') {        
    $this->db->from('card_sales');  
    }  
    $this->db->like('date', $today);
    $this->db->select_sum('amount');
    $this->db->select_sum('commission');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


//================================== Cash =========================================

  function cash_capital($date) {

    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    $this->db->from('cash');    
    $this->db->where('type','capital');
    $this->db->like('date', $today);
    $this->db->select_sum('credit');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }

  function cash_debit($date) {

    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    $this->db->from('cash');    
    $this->db->where('type','Disbursment');
    $this->db->like('date', $today);
    $this->db->select_sum('debit');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }

 function cash_lifting($date) {

    if($date == NULL) {
    $originalDate = date("d-m-Y");
    $today = date("m-Y", strtotime($originalDate));
    } else {
        $today = $date;
    }
    $this->db->from('cash');    
    $this->db->where('type','Lifting');
    $this->db->like('date', $today);
    $this->db->select_sum('debit');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }









}
