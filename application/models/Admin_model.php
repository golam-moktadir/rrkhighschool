<?php

class Admin_model extends CI_Model {

    public $userid;
    public $reporting_id;
    public $user_name;
    public $office_name;
    public $user_email;
    public $user_password;
    public $user_contact;
    public $profile_pic;
    public $office_location;
    public $office_type;
    public $office_address;
    public $house_address;
    public $billing_address;
    public $shipping_address;
    public $country_code;
    public $division_code;
    public $district_code;
    public $upazila_code;
    public $designation;
    public $officer_id;
    public $office_id;
    public $monthName;
    public $year;
    public $this_month_tline_avail;
    public $this_month_ss_avail;
    public $this_month_tl_avail;
    public $this_month_spf_avail;
    public $this_month_wb_avail;
    public $last_month_tline_avail;
    public $last_month_ss_avail;
    public $last_month_tl_avail;
    public $last_month_spf_avail;
    public $last_month_wb_avail;
    public $this_fy_tline_avail;
    public $this_fy_ss_avail;
    public $this_fy_tl_avail;
    public $this_fy_spf_avail;
    public $this_fy_wb_avail;
    public $last_fy_tline_avail;
    public $last_fy_ss_avail;
    public $last_fy_tl_avail;
    public $last_fy_spf_avail;
    public $last_fy_wb_avail;


    /* bank info */
    public $bank_name;
    public $bank_address;
    public $bank_phone;
    public $bank_email;

    /* loan info */
    public $bank_id;
    public $account_no;
    public $no_of_installment;
    public $amount_of_installment;
    public $last_day_of_installment;
    public $starting_day_of_notification;
    public $due_date;
    public $comments;
    public $invest_mode;
    public $investment_no;
    /* HPSM */
    public $opening_date;
    public $period_in_month;
    public $investment_made;
    public $current_installment_size;
    public $unearned_outstanding;
    public $rent_outstanding;
    public $principal_outstanding;

    /* QTDR */
    public $interest_rate;

    /* MTR */
    public $amount_of_profit_marked_up;
    public $amount_of_investment;
    public $rr_percentage;
    public $rebate_allowed;
    /* Parts Info */
    public $parts_name;
    public $parts_model;
    public $parts_provider;
    public $parts_installed_vehicle_no;
    public $parts_installed_date;
    public $parts_validity;
    public $parts_repaired_date;

    /* Blue Book & insutance */
    public $papers_name;
    public $insurance_name;
    public $papers_provider;
    public $date_of_issue;
    public $vehicle_no;
    public $validity;
    public $issue_date;
    public $trip;
    public $schedule;
    public $bus;
    public $route;
    public $supervisor;
    public $voucher_no;
    public $income_head;
    public $counter;
    public $eat_q;
    public $unit_price;
    public $discount;
    public $parts_quantity;
    public $parts_rate;
    public $parts_total_amount;
    public $repair_type;
    public $parts_origin;

    public function insert_base_info() {
        $data = array(
            'base_id' => $this->bank_id,
            'generic_name' => $this->bank_name,
            'name' => $this->parts_name,
            'value' => $this->user_contact
        );
        if ($this->db->insert('base_data', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_all_base_info($base_id) {
        $this->db->where('base_id', $base_id);
        $query = $this->db->get('base_data');
        return $query->result();
    }

    public function insert_asset_info() {
        if ($this->repair_type == 1) {
            $this->Admin_model->parts_total_amount = $this->input->post('fa_total_amount');
            $data = array(
                'user_id' => '1',
                'fa_date' => $this->parts_installed_date,
                'fa_product_name' => $this->parts_name,
                'fa_product_model' => $this->parts_model,
                'fa_product_band' => $this->parts_installed_vehicle_no,
                'fa_provider' => $this->parts_provider,
                'fa_price' => $this->parts_rate,
                'fa_quantity' => $this->parts_quantity,
                'fa_total_amount' => $this->parts_total_amount
            );
            if ($this->db->insert('fixed_asset_info', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else if ($this->repair_type == 2) {
            $data = array(
                'user_id' => '1',
                'ca_date' => $this->parts_installed_date,
                'ca_cash_type' => $this->parts_name,
                'ca_amount' => $this->parts_model,
                'ca_receiver' => $this->parts_installed_vehicle_no
            );
            if ($this->db->insert('current_asset_info', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else if ($this->repair_type == 3) {
            $data = array(
                'user_id' => '1',
                'lsa_date' => $this->parts_installed_date,
                'lsa_type' => $this->parts_name,
                'lsa_lost_by' => $this->parts_model,
                'lsa_stolen_by' => $this->parts_installed_vehicle_no,
                'lsa_amount' => $this->parts_provider,
                'lsa_quantity' => $this->parts_rate
            );
            if ($this->db->insert('lost_stolen_asset_info', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else if ($this->repair_type == 4) {
            $this->Admin_model->parts_installed_date = $this->input->post('dra_date');
            $this->Admin_model->parts_name = $this->input->post('dra_product_name');
            $this->Admin_model->parts_model = $this->input->post('dra_product_model');
            $this->Admin_model->parts_installed_vehicle_no = $this->input->post('dra_product_band');
            $this->Admin_model->parts_provider = $this->input->post('dra_provider');
            $this->Admin_model->comments = $this->input->post('dra_damage_type');
            $this->Admin_model->parts_rate = $this->input->post('dra_price');
            $this->Admin_model->parts_quantity = $this->input->post('dra_quantity');
            $this->Admin_model->parts_total_amount = $this->input->post('dra_total_amount');

            $data = array(
                'user_id' => '1',
                'dra_date' => $this->parts_installed_date,
                'dra_product_name' => $this->parts_name,
                'dra_product_model' => $this->parts_model,
                'dra_product_band' => $this->parts_installed_vehicle_no,
                'dra_provider' => $this->parts_provider,
                'dra_price' => $this->parts_rate,
                'dra_quantity' => $this->parts_quantity,
                'dra_total_amount' => $this->parts_total_amount,
                'dra_damage_type' => $this->comments
            );
            if ($this->db->insert('damage_repair_asset_info', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function get_all_asset_info_by_asset($asset_type, $date_of_issue_from, $date_of_issue_to) {
        if ($asset_type == "1") {
            if ($date_of_issue_from != "" && $date_of_issue_to != "") {
                $this->db->where('fa_date >=', $date_of_issue_from);
                $this->db->where('fa_date <=', $date_of_issue_to);
            }
            $this->db->from('fixed_asset_info');
        } else if ($asset_type == "2") {
            if ($date_of_issue_from != "" && $date_of_issue_to != "") {
                $this->db->where('ca_date >=', $date_of_issue_from);
                $this->db->where('ca_date <=', $date_of_issue_to);
            }
            $this->db->from('current_asset_info');
        } else if ($asset_type == "3") {
            if ($date_of_issue_from != "" && $date_of_issue_to != "") {
                $this->db->where('lsa_date >=', $date_of_issue_from);
                $this->db->where('lsa_date <=', $date_of_issue_to);
            }
            $this->db->from('lost_stolen_asset_info');
        } else if ($asset_type == "4") {
            if ($date_of_issue_from != "" && $date_of_issue_to != "") {
                $this->db->where('dra_date >=', $date_of_issue_from);
                $this->db->where('dra_date <=', $date_of_issue_to);
            }
            $this->db->from('damage_repair_asset_info');
        }
        $this->db->select('*', FALSE);
        $this->db->order_by('issue_date', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_all_parts_info_specific($name, $model, $vehicle, $repair_type, $date_of_issue_from, $date_of_issue_to) {
        if ($name != "") {
            $this->db->where('parts_name', $name);
            // echo $name;
        }
        if ($model != "") {
            $this->db->where('parts_model_no', $model);
        }
        if ($vehicle != "") {
            $this->db->where('parts_installed_vehicle_no', $vehicle);
        }
        if ($repair_type != "") {
            $this->db->where('repair_type', $repair_type);
            // echo $repair_type;
        }
        if ($date_of_issue_from != "" && $date_of_issue_to != "") {
            $this->db->where('parts_installed_date >=', $date_of_issue_from);
            $this->db->where('parts_installed_date <=', $date_of_issue_to);
        }

        $this->db->from('parts_info');
        // $this->db->order_by('parts_id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteBaseInfo() {
        $this->db->where('id', $this->userid);
        $this->db->delete('base_data');
    }

}
