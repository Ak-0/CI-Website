<?
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
  <div class="container">
    <div class="row">
	<div class="navigation">
		<ul style=" margin: 0px;display: flex;padding: 0px;">
  <a href='about'> <li class="<?php if($this->uri->segment(1)=="about"){echo "active";}?>">About Me</li></a>
  <a href='works'> <li class="<?php if($this->uri->segment(1)=="works"){echo "active";}?>">Skills</li></a>
  <a href='projects'> <li class="<?php if($this->uri->segment(1)=="projects"){echo "active";}?>" style="">Projects</li></a>
  <a href='contact'> <li class="<?php if($this->uri->segment(1)=="contact"){echo "active";}?>">Contact</li>  </a>
  
  </ul></div>
 <div class="column" >
