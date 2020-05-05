  <style>
  input[type=checkbox] {
      transform: scale(2);
      -webkit-transform: scale(2);
    }

    .cekbesar{
        margin:20px;
        padding:5px;
    }
</style>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <form action="<?php echo base_url('C_Config/ubah_config_unreg'); ?>" method="post">
            <div class="form-group">
                <label>OLT</label>
                <div class="form-line">
                    <select class="form-control js-example-basic-single" name="olt" onchange="ubah_vlan(this.value)">
                        <option disabled selected value>-- Pilih OLT --</option>
                        <?php
                        foreach ($data_olt as $D) {
                            echo '<option value="'.$D->id_device.'" >'.$D->device.' || '.$D->ip.' </option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label for="exampleInputEmail1">Interface</label>
                        <input class="form-control" type="text" placeholder="gpon-onu_x/x/xx:x        HWTCFxxxxxxx" name="interface" >
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Port</label>
                        <input class="form-control" type="number" placeholder="" name="port" max="128" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1">ONT EXISTING</label>
                        <input class="form-control" type="text" placeholder="gpon-onu_x/x/xx:x" name="ontex" >
                    </div>
                </div>
            </div>
         <div>
            <div class="form-group">
                 <div class="form-row">
                    <div class="col-md-6">
                        <label for="exampleInputName">Nama Pelanggan</label>
                        <input class="form-control"  type="text" placeholder="Masukan Nama Pelanggan" name="namapelanggan">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputLastName">Alamat Pelanggan</label>
                        <input class="form-control"  type="text" placeholder="Masukan Alamat Pelanggan" name="alamatpelanggan" >
                    </div>
                </div>
            </div>
     </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="exampleInputName">VLAN ID</label>
                            <select class="form-control" name="inet">
                                <option selected value="197">197</option>
                                <option value="2011">2011</option>
                                <option value="2069">2069</option>
                                <option value="2096">2096</option>
                                <option value="2068">2068</option>
                                <option value="2086">2086</option>
                                <option value="2400">2400</option>
                            </select>
                    </div>
                    <div class="col-md-2">
                        <label for="exampleInputName">V-PORT</label>
                            <select class="form-control" name="vport">
                                <option selected value="6">6</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                    </div>
                  
                    <div class="col-md-7">
                        <label for="exampleInputName">Port Eth</label>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" class="cekbesar" name="port_eth[]" checked>
                              1
                            </label>
                            <label>
                              <input type="checkbox" value="2" class="cekbesar" name="port_eth[]">
                              2
                            </label>
                            <label>
                              <input type="checkbox" value="3" class="cekbesar" name="port_eth[]">
                              3
                            </label>
                            <label>
                              <input type="checkbox" value="4" class="cekbesar" name="port_eth[]">
                              4
                            </label>
                          </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-danger" value="Eksekusi">
                           </form>
            </div>
<!--             <div class="form-group" >
                <button class="btn btn-danger" id="copy"  >Copy</button>

            </div>

 -->
</div>

    <div class="col-md-7 col-sm-12">
        <div class="form-group" id="root">
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
                <textarea style="width : 0px ; height : 0px ; " id="HWT">
                </textarea>
            </div>
            <div class="col-md-12" >
                <textarea style="width : 0px ; height : 0px ; " id="ZTE">
 <?php                  
if(strpos ($replace->interface, ':'))
{
  ?>
end
con t
int gpon-olt_<?php echo $replace->interface ; ?>

interface gpon-onu_<?php echo $replace->interface ;  $port = str_replace(',','',$replace->port_eth) ; ?>
 name WIFIID <?php echo $replace->namapelanggan ; ?>
                  
  description <?php echo $replace->alamatpelanggan ; ?>
                  
  tcont <?php echo $this->uri->segment(6) ; ?> name WIFIID profile UP-50M
  gemport <?php echo $this->uri->segment(6) ; ?> name WIFIID tcont <?php echo $this->uri->segment(6) ; ?>
                  
  gemport <?php echo $this->uri->segment(6) ; ?> traffic-limit downstream DOWN-50M
  service-port <?php echo $this->uri->segment(6) ; ?> vport <?php echo $this->uri->segment(6) ; ?> user-vlan <?php echo $this->uri->segment(5) ; ?> vlan <?php echo $this->uri->segment(5) ; ?>
                  
  service-port <?php echo $this->uri->segment(6) ; ?> description WIFIID
!

pon-onu-mng gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?> 
  service WIFIID gemport <?php echo $this->uri->segment(6) ; ?> vlan <?php echo $this->uri->segment(5) ; ?>
                  
  <?php 
    if($port == '1234')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '12')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
      <?php
    }elseif($port == '13')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
      <?php
    }elseif($port == '14')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '23')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
      <?php
    }elseif($port == '24')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '34')
    {
      ?>
vlan port eth_0/3  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '123')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
      <?php
    }elseif($port == '124')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '134')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '234')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '1')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
      <?php
    }elseif($port == '2')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
      <?php
    }elseif($port == '3')
    {
      ?>
vlan port eth_0/3  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet
      <?php
    }elseif($port == '4')
    {
      ?>
vlan port eth_0/4  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4 from-internet
      <?php
    }
  ?>                
! 
      <?php
    }else{
?>  
end
con t
int gpon-olt_<?php echo $replace->interface ; ?>
                  
no onu <?php echo $replace->port ; ?>

onu <?php echo $replace->port ; ?> type HUAWEI-HG8245A sn <?php echo $replace->ont ; ?>
                  
!
interface gpon-onu_<?php echo $replace->interface ;  $port = str_replace(',','',$replace->port_eth) ; ?>:<?php echo $replace->port ; ?>  
 name WIFIID <?php echo $replace->namapelanggan ; ?>|<?php echo $replace->ont ; ?>
                  
  description <?php echo $replace->alamatpelanggan ; ?>
                  
  tcont <?php echo $this->uri->segment(6) ; ?> name WIFIID profile UP-50M
  gemport <?php echo $this->uri->segment(6) ; ?> name WIFIID tcont <?php echo $this->uri->segment(6) ; ?>
                  
  gemport <?php echo $this->uri->segment(6) ; ?> traffic-limit downstream DOWN-50M
  service-port <?php echo $this->uri->segment(6) ; ?> vport <?php echo $this->uri->segment(6) ; ?> user-vlan <?php echo $this->uri->segment(5) ; ?> vlan <?php echo $this->uri->segment(5) ; ?>
                  
  service-port <?php echo $this->uri->segment(6) ; ?> description WIFIID
!

pon-onu-mng gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?> 
  service WIFIID gemport <?php echo $this->uri->segment(6) ; ?> vlan <?php echo $this->uri->segment(5) ; ?>
                  
  <?php 
    if($port == '1234')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '12')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
      <?php
    }elseif($port == '13')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
      <?php
    }elseif($port == '14')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '23')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
      <?php
    }elseif($port == '24')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '34')
    {
      ?>
vlan port eth_0/3  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '123')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
      <?php
    }elseif($port == '124')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/2  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '134')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '234')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
vlan port eth_0/3  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet          
vlan port eth_0/4  mode tag vlan <?php  echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4  from-internet          
      <?php
    }elseif($port == '1')
    {
      ?>
vlan port eth_0/1  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/1  from-internet
      <?php
    }elseif($port == '2')
    {
      ?>
vlan port eth_0/2  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/2  from-internet
      <?php
    }elseif($port == '3')
    {
      ?>
vlan port eth_0/3  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/3  from-internet
      <?php
    }elseif($port == '4')
    {
      ?>
vlan port eth_0/4  mode tag vlan <?php echo $this->uri->segment(5) ; ?>
                  
dhcp-ip ethuni eth_0/4 from-internet
      <?php
    }
  ?>                
! 

<?php
  }
  ?>                
                  

                </textarea>
                <textarea style="width : 0px ; height : 0px ; " id="ALC">
configure pon interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?> admin-state up
configure equipment ont interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?> sw-ver-pland <?php if(substr($replace->ont,0,2) == "FA"){ echo "3FE54869ACEC29" ; }elseif(substr($replace->ont,0,2) == "B1" || substr($replace->ont,0,2) == "B2"){ echo "3FE46606BFHB21" ; }else{ echo "3FE56557CFEA02" ; } ?> sernum ALCL:<?php echo $replace->ont ; ?> subslocid WILDCARD voip-allowed iphost cvlantrans-mode local
configure equipment ont interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?> admin-state up
configure equipment ont slot <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1 planned-card-type 10_100base plndnumdataports 8 plndnumvoiceports 0 admin-state up
configure equipment ont slot <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/2 planned-card-type pots plndnumdataports 0 plndnumvoiceports 2 admin-state up
configure equipment ont slot <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/14 planned-card-type veip plndnumdataports 1 plndnumvoiceports 0 admin-state up


  <?php 
    if($port == '1234')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up
                  
      <?php
    }elseif($port == '12')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up
      <?php
    }elseif($port == '13')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up
      <?php
    }elseif($port == '14')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up
      <?php
    }elseif($port == '23')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up
      <?php
    }elseif($port == '24')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up
      <?php
    }elseif($port == '34')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up
      <?php
    }elseif($port == '123')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up
      <?php
    }elseif($port == '124')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up      <?php
    }elseif($port == '134')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up      <?php
    }elseif($port == '234')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up
      <?php
    }elseif($port == '1')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/1 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/1 admin-up      
                  <?php
    }elseif($port == '2')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/2 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/2 admin-up
     <?php
    }elseif($port == '3')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/3 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/3 admin-up      <?php
    }elseif($port == '4')
    {
      ?>
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-102400K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 queue 0 shaper-profile name:DOWN-102400K
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 vlan-id 197
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>/1/4 pvid 197
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace-port ; ?>1/4 admin-up
      <?php
    }
  ?>                
                  
                </textarea>
              
                <textarea style="width : 0px ; height : 0px ; position : absolute ;" id="default">
Berisi Script Config
              </textarea>
              
            </div>
        </div>
        <div class="form-group">
<?php 
//     $ch = curl_init() ;
//     curl_setopt($ch,CURLOPT_URL,"https://ibooster.telkom.co.id/index.php") ;
//     curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1) ;
//     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1) ;
//     $response = curl_exec($ch) ;
//     curl_close($ch) ;
//     echo $response ;
?>
      </div>
    </div>
<!-- <div id="root"> 
</div> -->
  


                

                
