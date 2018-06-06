<?php

class PRT_PB_Customizer_Panels extends PRT_PB_Customizer{

    public function get_panels(){

        $panels = array();

        $panels['colors'] = array(
            'id' => $this->prefix . 'colors',
            'priority' => 150,
            'capability' => 'edit_theme_options',
            'title' => __( 'PB: Colors', 'pinkbutterflies' )
        );

        return $panels;

    }

}
