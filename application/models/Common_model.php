<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {
    //26-06-19
    public function exits_check($table_name,$index_array, $id = null ){           
           
        if($id){
            $this->db->where_not_in('record_id', $id);
        }
        $this->db->where($index_array);
        return $this->db->get($table_name)->num_rows();            
    }
    //26-06-19
    public function get_all_subject($id=null)
    {
        $this->db->select('S.*,C.class_name');
        $this->db->from('7_create_subject as S');
        $this->db->join('1_create_class as C', 'S.class_id = C.record_id', 'left');
        $this->db->order_by('S.record_id', 'desc');
        if($id!='')
        {
            $this->db->where("S.record_id",$id);
            return $this->db->get()->row_array();
        }else{
            return $this->db->get()->result_array();
        }
    }
    //26-06-19
    public function get_list($table_name,$coloum=null,$index_array=null,$order_column=null,$order_name=null)
    {
        if($coloum!='')
            $this->db->select($coloum);
        else
            $this->db->select('*');

        $this->db->from($table_name);
        
        if(!empty($index_array))
            $this->db->where($index_array);
        
        if($order_column!='' && $order_name)
            $this->db->order_by($order_column,$order_name);
         
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_class_by_teacher_for_marks($teacher_id,$session_id)
    {
        $this->db->select('SM.class_id,C.class_name');
        $this->db->from('25_teacher_subject_management as SM');
        $this->db->join('1_create_class as C', 'SM.class_id = C.record_id', 'left');
        $this->db->group_by('SM.class_id');
        $this->db->where('SM.teacher_id', $teacher_id);
        $this->db->where('SM.session_id', $session_id);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_shift_by_teacher_for_marks($teacher_id,$session_id)
    {
        $this->db->select('SM.shift_id,S.shift_name');
        $this->db->from('25_teacher_subject_management as SM');
        $this->db->join('4_create_shift as S', 'SM.shift_id = S.record_id', 'left');
        $this->db->group_by('SM.shift_id');
        $this->db->where('SM.teacher_id', $teacher_id);
        $this->db->where('SM.session_id', $session_id);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_group_by_teacher_for_marks($teacher_id,$session_id)
    {
        $this->db->select('SM.group_id,G.group_name,IFNULL(SM.group_id,0)');
        $this->db->from('25_teacher_subject_management as SM');
        $this->db->join('2_create_group as G', 'SM.group_id = G.record_id');
        $this->db->group_by('SM.group_id');
        $this->db->where('SM.teacher_id', $teacher_id);
        $this->db->where('SM.session_id', $session_id);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_section_by_teacher_for_marks($teacher_id,$session_id)
    {
        $this->db->select('SM.section_id,S.section_name,IFNULL(SM.section_id,0)');
        $this->db->from('25_teacher_subject_management as SM');
        $this->db->join('3_create_section as S', 'SM.section_id = S.record_id');
        $this->db->group_by('SM.section_id');
        $this->db->where('SM.teacher_id', $teacher_id);
        $this->db->where('SM.session_id', $session_id);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_subject_by_multiple_condition_for_marks($checking_array)
    {
        $this->db->select('SM.subject_id,S.subject_name');
        $this->db->from('25_teacher_subject_management as SM');
        $this->db->join('7_create_subject as S', 'SM.subject_id = S.record_id', 'left');
        $this->db->where($checking_array);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function insert_batch($table_name,$data_array)
    {
        $this->db->insert_batch($table_name, $data_array);

        return $this->db->insert_id();
    }
    //26-06-19
    public function get_exam_type()
    {
        $this->db->select('ET.*,C.class_name,S.session_name');
        $this->db->from('8_create_exam_type as ET');
        $this->db->join('1_create_class C', 'ET.class_id = C.record_id', 'left');
        $this->db->join('5_create_session S', 'ET.session_id = S.record_id', 'left');
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_teacher_subject()
    {
        $this->db->select('TS.record_id,T.name as teacher_name,T.teacher_unique_id,C.class_name,G.group_name,SC.section_name,S.session_name,SB.subject_name,SP.shift_name');
        $this->db->from('25_teacher_subject_management as TS');
        $this->db->join('13_insert_teacher_info as T', 'TS.teacher_id = T.record_id', 'left');
        $this->db->join('1_create_class as C', 'TS.class_id = C.record_id', 'left');
        $this->db->join('3_create_section as SC', 'TS.section_id = SC.record_id', 'left');
        $this->db->join('4_create_shift as SP', 'TS.shift_id = SP.record_id', 'left');
        $this->db->join('2_create_group as G', 'TS.group_id = G.record_id', 'left');
        $this->db->join('5_create_session as S', 'TS.session_id = S.record_id', 'left');
        $this->db->join('7_create_subject as SB', 'TS.subject_id = SB.record_id', 'left');
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_single($table_name,$index_array,$columns=null)
    {
        if ($columns)
            $this->db->select($columns);

        $this->db->order_by('record_id', 'desc');
        $this->db->limit(1);

        $row = $this->db->get_where($table_name, $index_array)->row();

        return $row;
    }
    //26-06-19
    public function get_student_mark($checking_array)
    {
        $this->db->select('M.record_id as mark_id,M.*,
        S.name,S.roll,S.student_unique_id,
        SB.subject_name,SB.written_mark as s_written_mark,SB.subject_total_mark,SB.practical as practical,SB.practical_mark as s_practical_mark,SB.mcq,SB.mcq_mark as s_mcq_mark,S.fourth_subject');
        $this->db->from('26_grade_mark_management as M');
        $this->db->join('12_insert_student_info S', 'M.student_id = S.record_id', 'left');
        $this->db->join('7_create_subject as SB', 'M.subject_id = SB.record_id', 'left');
        // $this->db->join('7_create_subject as SBF', 'S.fourth_subject_id = SBF.record_id', 'left');
        $this->db->where("M.class_id",$checking_array['class_id']);
        $this->db->where("M.section_id",$checking_array['section_id']);
        $this->db->where("M.session_id",$checking_array['session_id']);
        $this->db->where("M.shift_id",$checking_array['shift_id']);
        $this->db->where("M.teacher_id",$checking_array['teacher_id']);
        $this->db->where("M.group_id",$checking_array['group_id']);
        $this->db->where("M.subject_id",$checking_array['subject_id']);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_student_mark_sheet($data_array)
    {
        $this->db->select('MM.record_id,MM.student_id,COUNT(MM.subject_id) as total_subject, ST.name as student_name,ST.student_unique_id,ST.father_name,ST.mother_name,ST.roll,SE.section_name,
        ST.fourth_subject_id,G.group_name,CL.class_name,ET.exam_type');
        $this->db->from('26_grade_mark_management as MM');
        $this->db->join('1_create_class CL', 'MM.class_id = CL.record_id', 'left');
        $this->db->join('3_create_section SE', 'MM.section_id = SE.record_id', 'left');
        $this->db->join('2_create_group G', 'MM.group_id = G.record_id', 'left');
        $this->db->join('12_insert_student_info ST', 'MM.student_id = ST.record_id', 'left');
        $this->db->join('8_create_exam_type ET', 'MM.exam_id = ET.record_id', 'left');
        $this->db->where("MM.session_id",$data_array['session_id']);
        $this->db->where("MM.class_id",$data_array['class_id']);
        $this->db->where("MM.shift_id",$data_array['shift_id']);
        $this->db->where("MM.exam_id",$data_array['exam_id']);
        $this->db->where("MM.status",1);
        $this->db->where("MM.subject_available",1);
        $this->db->group_by("MM.student_id");
        if($data_array['section_id']!='')
        {
            $this->db->where("MM.section_id",$data_array['section_id']);
        }
        if($data_array['group_id']!='')
        {
            $this->db->where("MM.group_id",$data_array['group_id']);
        }
        if($data_array['student_id']!='')
        {
            $this->db->where("MM.student_id",$data_array['student_id']);
        }
        $data=array();
        $result= $this->db->get()->result_array();
        if(isset($result))
        {
            foreach($result as $key=>$value)
            {
                $get_subject_mark=$this->get_subject_mark($data_array,$value['student_id']);
                $data[$key]['record_id']=$value["record_id"];
                $data[$key]['student_name']=$value["student_name"];
                $data[$key]['student_unique_id']=$value["student_unique_id"];
                $data[$key]['roll']=$value["roll"];
                $data[$key]['class_name']=$value["class_name"];
                $data[$key]['section_name']=$value["section_name"];
                $data[$key]['group_name']=$value["group_name"];
                $data[$key]['father_name']=$value["father_name"];
                $data[$key]['mother_name']=$value["mother_name"];
                $data[$key]['exam_type']=$value["exam_type"];
                $data[$key]['total_subject']=$value["total_subject"];
                $extra_point=0;
                $total_point=0;
                $temp_total_point=0;
                $subject_count=0;
                $fail=1;
                $fourth_subject_name="";
                $fourth_subject_id="";
                $fourth_subject_point="";
                if(isset($get_subject_mark))
                {
                    foreach($get_subject_mark as $s_key=>$s_value)
                    {
                        if($value['fourth_subject_id']==$s_value['subject_id'])
                        {
                            if($s_value['grade_point']>=2)
                            {
                                $extra_point=$s_value['grade_point']-2;
                            }else{
                                $extra_point=0;
                            }
                            $fourth_subject_name=$s_value['subject_name'];
                            $fourth_subject_id=$s_value['subject_id'];
                            $fourth_subject_point=$s_value['grade_point'];
                        }else{
                            if($s_value['subject_available']==1)
                            {
                                $subject_count++;
                                $temp_total_point+=$s_value['grade_point'];
                            }
                            if($s_value['grade']==="F" && $s_value['subject_available']==1)
                            {
                                $fail=0;
                            }
                        }
                        $total_point=$extra_point+$temp_total_point;

                    }
                }
                $avg_point=(float)($total_point/$subject_count);
                $data[$key]['total_with_out_fourth']=$subject_count;
                $data[$key]['fourth_subject_name']=$fourth_subject_name;
                $data[$key]['fourth_subject_point']=$fourth_subject_point;
                $data[$key]['addition_point']=$extra_point;
                $data[$key]['fourth_subject_id']=$fourth_subject_id;
                if($fail==0)
                {
                    $data[$key]['avg_grade']="F";
                    $data[$key]['avg_point']=0.00;
                }else{
                    $data[$key]['avg_grade']=point_to_grade($avg_point);
                    $data[$key]['avg_point']=$avg_point;
                }
                $data[$key][$value["student_unique_id"]]=$get_subject_mark;
            }
        }
        return $data;
        
    }
    //26-06-19
    public function get_subject_mark($data_array,$student_id)
    {
        $this->db->select('MM.total_mark,MM.grade,MM.grade_point,MM.subject_id,MM.subject_available,SB.subject_name,SB.subject_total_mark');
        $this->db->from('26_grade_mark_management as MM');
        $this->db->join('7_create_subject SB', 'MM.subject_id = SB.record_id', 'left');
        $this->db->order_by("SB.subject_name","ASC");
        $this->db->where("MM.session_id",$data_array['session_id']);
        $this->db->where("MM.class_id",$data_array['class_id']);
        $this->db->where("MM.shift_id",$data_array['shift_id']);
        $this->db->where("MM.exam_id",$data_array['exam_id']);
        $this->db->where("MM.subject_available",1);
        $this->db->where("MM.status",1);
        if($data_array['section_id']!='')
        {
            $this->db->where("MM.section_id",$data_array['section_id']);
        }
        if($data_array['group_id']!='')
        {
            $this->db->where("MM.group_id",$data_array['group_id']);
        }
        $this->db->where("MM.student_id",$student_id);

        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_student_total_result($checking_array)
    {
        $this->db->select('sum(if(subject_available=1,total_mark,0)) as s_total_mark,grade_point,COUNT(subject_id) as total_subject,COUNT(subject_id) as total_subject,student_id,GM.session_id,S.name as student_name,S.roll,S.fourth_subject_id,S.student_unique_id');
        $this->db->from('26_grade_mark_management as GM');
        $this->db->join('12_insert_student_info as S', 'GM.student_id = S.record_id', 'left');
        $this->db->group_by('GM.student_id');
        $this->db->order_by("GM.grade_point","desc");
        $this->db->order_by("s_total_mark","DESC");
        $this->db->order_by("S.roll","asc");
        $this->db->where($checking_array);
        $this->db->where("subject_available",1);
        $result=$this->db->get()->result_array();
        $data=array();
        $status=1;
        $total_subject=0;
        $total_gpa_point=0;
        $addtion_gpa_point=0;
        if(isset($result))
        {
            foreach($result as $key=>$value)
            {
                $fail=$this->get_fail($value['session_id'],$value['student_id']);
                $subject=$this->get_subject($value['session_id'],$value['student_id']);
                // $data[]=$fail;
                $data[$key]['position']=++$key;
                $data[$key]['roll']=$value['roll'];
                $data[$key]['student_name']=$value['student_name'];
                $data[$key]['student_unique_id']=$value['student_unique_id'];
                $data[$key]['total_mark']=$value['s_total_mark'];
                if(isset($fail) && !empty($fail))
                {
                    $status=0;
                    foreach($fail as $f_key=>$f_value)
                    {
                        if($f_value['subject_id']!=$value['fourth_subject_id'])
                        {
                            $status=0;
                            break;
                        }else{
                            $status=1;
                        }
                    }
                }else{
                    $status=1;
                }
                if(isset($subject))
                {
                    foreach($subject as $s_key=>$s_value)
                    {
                        if($s_value['subject_id']!=$value['fourth_subject_id'])
                        {
                            $total_subject++;
                            $total_gpa_point+=$s_value['grade_point'];
                        }else{
                            if($s_value['grade_point']>=2)
                            {
                                $addtion_gpa_point=$s_value['grade_point']-2;
                            }else{
                                $addtion_gpa_point=0;
                            }
                        }
                    }
                }
                if($status==1)
                {
                    $data[$key]['status']="Passed";
                    $data[$key]['gpa_point']=round((($total_gpa_point+$addtion_gpa_point)/$total_subject),2,PHP_ROUND_HALF_UP);
                    $data[$key]['gpa_letter']=point_to_grade(round((($total_gpa_point+$addtion_gpa_point)/$total_subject),2,PHP_ROUND_HALF_UP));
                }else{
                    $data[$key]['status']="Fail";
                    $data[$key]['gpa_point']=0.00;
                    $data[$key]['gpa_letter']="F";
                }
                $total_gpa_point=0;
                $addtion_gpa_point=0;
                $total_subject=0;
                $status=1;
            }
        }
        return $data;
    }
    //26-06-19
    public function get_fail($session_id,$student_id)
    {
        $this->db->select('subject_id,student_id');
        $this->db->from('26_grade_mark_management');
        $this->db->where('session_id', $session_id);
        $this->db->where('student_id', $student_id);
        $this->db->where('grade',"F");
        $this->db->where('subject_available',1);
        $this->db->where('grade_point',0.00);
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_published_result()
    {
        $this->db->select('PB.record_id,PB.date,PB.status,C.class_name,S.section_name,G.group_name,E.exam_type,CS.session_name');
        $this->db->from('45_publish_result as PB');
        $this->db->join('1_create_class as C', 'PB.class_id = C.record_id', 'left');
        $this->db->join('3_create_section as S', 'PB.section_id = S.record_id', 'left');
        $this->db->join('2_create_group as G', 'PB.group_id = G.record_id', 'left');
        $this->db->join('8_create_exam_type as E', 'PB.exam_id = E.record_id', 'left');
        $this->db->join('5_create_session as CS', 'PB.session_id = CS.record_id', 'left');
        return $this->db->get()->result_array();
    }
    //26-06-19
    public function get_subject($session_id,$student_id)
    {
        $this->db->select('subject_id,student_id,grade_point');
        $this->db->from('26_grade_mark_management');
        $this->db->where('session_id', $session_id);
        $this->db->where('student_id', $student_id);
        $this->db->where('subject_available',1);
        return $this->db->get()->result_array();
    }
    //26-06-2019
    public function count_all($table_name, $index_array = null) {

        if ($index_array) {
            $this->db->where($index_array);
        }
        return $this->db->count_all_results($table_name);
    }
    function group_by_one_column($column_name, $table_name) {
        $this->db->group_by($column_name);
        $query = $this->db->get($table_name);
        return $query->result();
    }
    function group_by_one_column_where($column_name, $column_with_value_array, $table_name) {
        $this->db->where($column_with_value_array);
        $this->db->group_by($column_name);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_distinct_value_where($column_name, $table_name, $column_with_value_array) {
        $this->db->select($column_name);
        $this->db->distinct();
        $this->db->where($column_with_value_array);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function check_value_get_data_with_guardians($column_with_value_array) {
        $this->db->select('26_grade_mark_management.*,15_insert_guardian_info.name,15_insert_guardian_info.mobile');
        $this->db->from('26_grade_mark_management');
        $this->db->join('15_insert_guardian_info', '26_grade_mark_management.student_id = 15_insert_guardian_info.student_id');
        $this->db->where($column_with_value_array);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function check_value_get_data_with_parents($column_with_value_array) {
        $this->db->select('26_grade_mark_management.*,12_insert_student_info.*');
        $this->db->from('26_grade_mark_management');
        $this->db->join('12_insert_student_info', '26_grade_mark_management.student_id = 12_insert_student_info.student_unique_id');
        $this->db->where($column_with_value_array);
        $this->db->order_by('26_grade_mark_management.subject_serial');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get_bank_name() {
        $this->db->select('bank_name');
        $this->db->distinct();
        $query = $this->db->get('create_bank_name');
        return $query->result();
    }

    //26-06-19
     public function get_student_collection($checking_array=null){
        $this->db->select('10_3_fee_collection.invoice_id,10_3_fee_collection.student_id,12_insert_student_info.name as student_name,12_insert_student_info.class_name as student_class_name,12_insert_student_info.roll,
        SUM(10_3_fee_collection.amount*10_3_fee_collection.quantity) as net_total,
        SUM(10_3_fee_collection.discount) as student_total_discount,
        SUM(10_3_fee_collection.total) as student_total_payable,
        SUM(10_3_fee_collection.payment) as student_total_payment,
        SUM((10_3_fee_collection.total-10_3_fee_collection.payment)) as student_total_due');
        $this->db->from('10_3_fee_collection');
        $this->db->join("12_insert_student_info","10_3_fee_collection.student_id=12_insert_student_info.student_unique_id");
        $this->db->group_by('10_3_fee_collection.invoice_id');
        $this->db->order_by('10_3_fee_collection.invoice_id', 'desc');
        $this->db->where($checking_array);
        $result=$this->db->get()->result();
        $data=array();
        $final_data=array();
        if(!empty($result))
        {
            $net_total=0;
            $student_total_discount=0;
            $student_total_payable=0;
            $student_total_payment=0;
            $student_total_due=0;
            foreach($result as $key=>$value)
            {
                $net_total+=$value->net_total;
                $student_total_discount+=$value->student_total_discount;
                $student_total_payable+=$value->student_total_payable;
                $student_total_payment+=$value->student_total_payment;
                $student_total_due+=$value->student_total_due;
                $invoice_result=$this->get_student_invoice($value->invoice_id,$checking_array);
                $temp_data=array();
                if(!empty($invoice_result))
                {
                    $previous_due=0;
                    foreach($invoice_result as $key2=>$invoice_value)
                    {
                        $previous_due=$invoice_value->invoice_recent_due-($invoice_value->invoice_total-$invoice_value->invoice_payment);
                        $temp_data[$key2]['date']=date("d/m/Y",strtotime($invoice_value->insertion_date));
                        $temp_data[$key2]['student_id']=$value->student_id;
                        $temp_data[$key2]['student_name']=$value->student_name;
                        $temp_data[$key2]['student_class_name']=$value->student_class_name;
                        $temp_data[$key2]['student_roll']=$value->roll;
                        $temp_data[$key2]['invoice']=$value->invoice_id;
                        $temp_data[$key2]['invoice_without_discount']=$invoice_value->invoice_total_without_discount;
                        $temp_data[$key2]['invoice_previous_due']=$previous_due;
                        $temp_data[$key2]['invoice_grand_total']=$previous_due+$invoice_value->invoice_total_without_discount;
                        $temp_data[$key2]['invoice_discount']=$invoice_value->invoice_total_discount;
                        $temp_data[$key2]['invoice_payable']=$previous_due+$invoice_value->invoice_total;
                        $temp_data[$key2]['invoice_payment']=$invoice_value->invoice_payment;
                        $temp_data[$key2]['invoice_recent_due']=$invoice_value->invoice_recent_due;
                    }
                }
                $data[$key]['value']=$temp_data;
            }
            $final_data["invoice_value"]=$data;
            $final_data["net_total"]=$net_total;
            $final_data["student_total_discount"]=$student_total_discount;
            $final_data["student_total_payable"]=$student_total_payable;
            $final_data["student_total_payment"]=$student_total_payment;
            $final_data["student_total_due"]=$student_total_due;
        }
        
        return $final_data;
        
        
    }
    //26-06-19
    function get_student_invoice($invoice_id,$checking_array=null){
        $this->db->select('*,SUM(total) as invoice_total,SUM(amount*quantity) as invoice_total_without_discount,SUM(discount) as invoice_total_discount,SUM(payment) as invoice_payment,SUM(due) as invoice_recent_due');
        $this->db->from('10_3_fee_collection');
        if($checking_array!='')
        {
            $this->db->where($checking_array);
        }
        $this->db->where("invoice_id",$invoice_id);
        $this->db->select_max("invoice_id","max_invoice_id");
        $this->db->group_by('invoice_id');
        $this->db->order_by('invoice_id', 'desc');
        $result=$this->db->get()->result();
        return $result;
    }
      function get_fee_collection_invoice() {
        $this->db->select('invoice_id');
        $this->db->distinct();
        $this->db->order_by('invoice_id', 'DESC');
        $query = $this->db->get('10_3_fee_collection');
        return $query->result();
    }

    function get_last_data_byid($table_name, $where_column, $where_column_value) {
        $this->db->where($where_column, $where_column_value);
        $this->db->order_by('record_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_student_info_order_by($table_name) {
        $this->db->order_by('record_id', 'DESC');
        $query = $this->db->get($table_name);
        return $query->result();
    }
     function get_all_info_limit_offset($table_name, $limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_student_info_roll_wise($table_name, $column_with_value_array) {
        $this->db->order_by('roll', 'ASC');
        $this->db->where($column_with_value_array);
        $query = $this->db->get($table_name);
        return $query->result();
    }
    function get_all_info_by_array($table_name, $column_with_value_array) {
        $this->db->where($column_with_value_array);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_all_info_by_class_name($table_name, $where_column, $where_column_value) {
        $this->db->where($where_column, $where_column_value);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_teacher_unique_id_distinct($where_column_value) {
        $this->db->select('teacher_unique_id');
        $this->db->distinct();
        $this->db->where('subject_name', $where_column_value);
        $query = $this->db->get('25_teacher_subject_management');
        return $query->result();
    }

    function get_distinct_subject_classwise($class_name) {
        $this->db->select('subject_name');
        $this->db->distinct();
        $this->db->where('class_name', $class_name);
        $query = $this->db->get('25_teacher_subject_management');
        return $query->result();
    }

    function get_distinct_teacher_id_classwise($class_name) {
        $this->db->select('teacher_unique_id');
        $this->db->distinct();
        $this->db->where('class_name', $class_name);
        $query = $this->db->get('25_teacher_subject_management');
        return $query->result();
    }

    function get_routine_time($column_with_value_array) {
        $this->db->order_by('class_time');
        $this->db->select('class_time');
        $this->db->distinct();
        // $this->db->where( FirstName='Tove' OR FirstName='Ola' 'session_name',$column_with_value_array['session_name']);
        $this->db->where("(session_name='" . $column_with_value_array['session_name'] . "' )");

        $query = $this->db->get('40_create_class_routine');
        return $query->result();
    }

    function data_date_to_date($table_name, $date_column, $date_from, $date_to) {
        $this->db->where($date_column . '>=', $date_from);
        $this->db->where($date_column . '<=', $date_to);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function update_data_onerow($table_name, $data, $where_column, $where_column_value) {
        $this->db->where($where_column, $where_column_value);
        $this->db->update($table_name, $data);
    }

    function insert_data($table_name, $data) {
        $query = $this->db->insert($table_name, $data);
        return $query;
    }

    function one_column_one_info($column_name, $id_column, $one_id, $table_name) {
        $this->db->select($column_name);
        $this->db->where($id_column, $one_id);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_allinfo_byid($table_name, $where_column, $where_column_value) {
        $this->db->where($where_column, $where_column_value);
    
        $this->db->order_by('record_id','desc');
        $this->db->group_by('record_id');
        $query = $this->db->get($table_name);
        return $query->result();
    }
    // function get_allinfo_byid($table_name) {
    //     $this->db->select('*');
    //     $this->db->order_by('record_id','desc');
    //     $this->db->group_by('record_id');
    //     $query = $this->db->get($table_name);
    //     return $query->result();
    // }

    function get_allinfo_byid_orerby($table_name, $where_column, $where_column_value, $order_column) {
        $this->db->where($where_column, $where_column_value);
        $this->db->order_by($order_column);
        $query = $this->db->get($table_name);
        return $query->result();
    }
    function get_allinfo_byid_orderby_invoice($table_name, $where_column, $where_column_value) {
        $this->db->where($where_column, $where_column_value);
        $this->db->order_by("invoice_id", "DESC");
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_allinfo_byid_limit_offset($limit, $offset, $table_name, $where_column, $where_column_value) {
        $this->db->limit($limit, $offset);
        $this->db->where($where_column, $where_column_value);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    public function get_all_info($table_name) {
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_all_info_orderby($table_name, $order_column, $order_details) {
        $this->db->order_by($order_column, $order_details);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function get_userid_balance($id) {
        $this->db->select('user_id, amount');
        $this->db->where('mlm_apply_agent_id', $id);
        $query = $this->db->get('mlm_apply_agent');
        return $query->result();
    }

    function check_value($table_name, $column_with_value_array) {
        $this->db->where($column_with_value_array);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_value_get_data($table_name, $column_with_value_array) {
        $this->db->where($column_with_value_array);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function check_value_get_data_orderby($table_name, $column_with_value_array, $column_name) {
        $this->db->where($column_with_value_array);
        $this->db->order_by($column_name);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function check_value_get_data_orderby_like($table_name, $column_with_value_array, $column_name, $like_column, $like_value) {
        $this->db->where($column_with_value_array);
        $this->db->like($like_column, $like_value);
        $this->db->order_by($column_name);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get_left_right_id($table_name, $parent_id, $parent_id_value) {
        $this->db->select('left_id, right_id');
        $this->db->where($parent_id, $parent_id_value);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function delete_where_array($table_name, $where_array) {
        $this->db->where($where_array);
        $query = $this->db->delete($table_name);
        return $query;
    }
    
     function delete_info($table_id, $deleted_id, $table_name) {
        $this->db->where($table_id, $deleted_id);
        $query = $this->db->delete($table_name);
        return $query;
    }

    function data_between_date($table_name, $column_name, $start_date, $end_date) {
        $this->db->where($column_name . '<=', $start_date);
        $this->db->where($column_name . '>=', $end_date);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function data_between_date_where($table_name, $column_date, $start_date, $end_date, $where_column, $where_column_value) {
        $this->db->where($where_column, $where_column_value);
        $this->db->where($column_date . '<=', $start_date);
        $this->db->where($column_date . '>=', $end_date);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function weekly_user_created($table_name, $column_date, $start_date, $end_date, $column_user, $column_user_value) {
        $this->db->where($column_user, $column_user_value);
        $this->db->where($column_date . '<=', $start_date);
        $this->db->where($column_date . '>=', $end_date);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function weekly_user_incentive($table_name, $column_date, $start_date, $end_date, $column_user, $column_user_value) {
        $this->db->where($column_user, $column_user_value);
        $this->db->where($column_date . '<=', $start_date);
        $this->db->where($column_date . '>=', $end_date);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function row_number_until_date($table_name, $date_column, $date) {
        $this->db->where($date_column . '<=', $date);
        $query = $this->db->get($table_name);
        return $query->num_rows();
    }

    function data_until_date_where_id($table_name, $date_column, $date, $where_column, $where_value) {
        $this->db->where($date_column . '<=', $date);
        $this->db->where($where_column, $where_value);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function data_until_date($table_name, $date_column, $date) {
        $this->db->where($date_column . '<=', $date);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function row_number_single_date($table_name, $date_column, $date) {
        $this->db->where($date_column, $date);
        $query = $this->db->get($table_name);
        return $query->num_rows();
    }

    function commission_until_date($table_name, $date_column, $date, $select_column) {
        $this->db->select_sum($select_column);
        $this->db->where($date_column . '<=', $date);
        $query = $this->db->get($table_name);
        $value = $query->row($select_column);
        if (empty($value)) {
            return 0;
        } else {
            return $value;
        }
    }

    function commission_single_date($table_name, $date_column, $date, $select_column) {
        $this->db->select_sum($select_column);
        $this->db->where($date_column, $date);
        $query = $this->db->get($table_name);
        $value = $query->row($select_column);
        if (empty($value)) {
            return 0;
        } else {
            return $value;
        }
    }

    function toalpayment_until_date($date) {
        $this->db->select_sum('getting_amount');
        $this->db->where('action', "yes");
        $this->db->where('STR_TO_DATE(date, "%d %M, %Y") <=', $date);
        $query = $this->db->get('mlm_withdraw');
        $value = $query->row('getting_amount');
        if (empty($value)) {
            return 0;
        } else {
            return $value;
        }
    }

    function toalpayment_data_until_date($date) {
        $this->db->where('action', "yes");
        $this->db->where('STR_TO_DATE(date, "%d %M, %Y") <=', $date);
        $query = $this->db->get('mlm_withdraw');
        return $query->result();
    }

    function toalpayment_data_single_date($date) {
        $this->db->where('action', "yes");
        $this->db->where('STR_TO_DATE(date, "%d %M, %Y")=', $date);
        $query = $this->db->get('mlm_withdraw');
        return $query->result();
    }

    function totalpayment_single_date($date) {
        $this->db->select_sum('getting_amount');
        $this->db->where('action', "yes");
        $this->db->where('STR_TO_DATE(date, "%d %M, %Y")=', $date);
        $query = $this->db->get('mlm_withdraw');
        $value = $query->row('getting_amount');
        if (empty($value)) {
            return 0;
        } else {
            return $value;
        }
    }

    function find_last_id($column_name, $table_name) {
        $this->db->insert_id($column_name);
        $query = $this->db->get($table_name);
        if ($query->num_rows() < 1) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function find_last_id_orderby($column_name, $table_name, $order_column) {
        $this->db->insert_id($column_name);
        $this->db->order_by($order_column);
        $query = $this->db->get($table_name);
        if ($query->num_rows() < 1) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function sum_one_columm_date_to_date_with_condition($table_name, $sum_col, $column_with_value_array, $date_column, $date_from, $date_to) {
        $this->db->select_sum($sum_col);
        $this->db->where($column_with_value_array);
        $this->db->where($date_column . '>=', $date_from);
        $this->db->where($date_column . '<=', $date_to);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function check_value_get_one_column($column_name, $column_with_value_array, $table_name) {
        $this->db->select($column_name);
        $this->db->where($column_with_value_array);
        $query = $this->db->get($table_name);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function data_date_to_date_with_check($table_name, $column_with_value_array, $date_column, $date_from, $date_to) {
        $this->db->where($column_with_value_array);
        $this->db->where($date_column . '>=', $date_from);
        $this->db->where($date_column . '<=', $date_to);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    function one_column_group_by($column_name, $table_name) {
        $this->db->select($column_name);
        $this->db->group_by($column_name);
        $query = $this->db->get($table_name);
        return $query->result();
    }

    public function get_all_alumni($table_name)
    {
        $this->db->select('*');
        $this->db->where(['approval_status' => 11]);
        $this->db->order_by('id','desc');
        $query = $this->db->get($table_name);
        return $query->result();

    }

    // Pagination Code Start 

    // Fetch records
  public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->order_by('id','desc');
    $this->db->group_by('id');
    $this->db->from('alumni_list');

    if($search != ''){
      $this->db->like('name', $search);
      $this->db->or_like('batch', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('alumni_list');
 
    if($search != ''){
      $this->db->like('name', $search);
      $this->db->or_like('batch', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
  public function get_single_row($data,$table_name){
    $this->db->where($data);
    $query = $this->db->get($table_name);
    return $query->row();
  }

    // Pagination Code END 

  function delete_alumni($id){

$this->db->delete('alumni_list', array('id' => $id)); 
//DELETE FROM tbl_user WHERE id = $id
  }

}

?>