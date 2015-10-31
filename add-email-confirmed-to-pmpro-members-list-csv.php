<?php
/*
   Plugin Name: Add Email Confirmed to PMPro Members List CSV
   Description: Adds an "email confirmed" column to Paid Membership Pro's members list CSV.
   Version: 1.0
   Author: Gabriel Deal
 */

defined('ABSPATH') or die('Direct access not allowed.');

// https://gist.github.com/strangerstudios/3111715

function aec2pmlc_pmpro_members_list_csv_extra_columns($columns) {
  $columns["email confirmed"] = "aec2pmlc_email_address_is_confirmed";
  
  return $columns;
}
add_filter("pmpro_members_list_csv_extra_columns", 
  "aec2pmlc_pmpro_members_list_csv_extra_columns", 
  10,
  2);

function aec2pmlc_email_address_is_confirmed($user)
{
  return $user->metavalues->pmpro_email_confirmation_key == "validated"
    ? "true"
    : "false";
}

