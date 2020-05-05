
<div class="row">
    <div class="col-md-6 col-sm-12">
        <form action="<?php echo base_url('C_Config/ubah_config'); ?>" method="post">
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
                        <input class="form-control" type="text" placeholder="gpon-onu_x/x/xx:x        HWTCFxxxxxxx" name="interface" required>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Port</label>
                        <input class="form-control" type="number" placeholder="" name="port" max="128" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="exampleInputName">Username Voip</label>
                        <input class="form-control"  type="text" placeholder="Masukan Username" name="username">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputLastName">Password Voip</label>
                        <input class="form-control"  type="text" placeholder="Masukan Password" name="password" >
                    </div>
                </div>
            </div>
         <div id="zt">
            <div class="form-group">
                 <div class="form-row">
                    <div class="col-md-6">
                        <label for="exampleInputName">Username Inet</label>
                        <input class="form-control"  type="text" placeholder="Masukan Username" name="username2">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputLastName">Password Inet</label>
                        <input class="form-control"  type="text" placeholder="Masukan Password" name="password2" >
                    </div>
                </div>
            </div>
     </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="exampleInputName">VLAN VOIP</label>
                        <input class="form-control" id="voip" type="text" placeholder="Masukan VLAN" name="voip" required>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputName">Profile</label>
                        <select class="form-control" name="profile" >
                          <option value="2" selected> Default(10MB) </option>
                            <?php
                            foreach ($data_profil as $D) {
                                echo '<option value="'.$D->id_profile.'" >'.$D->name.' Mbps</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputName">Domain</label>
                        <select class="form-control" name="domain" >
                          <option value="telkom.net" selected> @telkom.net </option>
                          <option value="apps.telkom" > @apps.telkom </option>
                          <option value="gold.telkom" > @gold.telkom </option>
                          <option value="school.net" > @school.net </option>
                          <option value="acs.telkom.net" > @acs.telkom.net </option>
                          <option value="cloud.amrpln.net" > @cloud.amrpln.net </option>
                          <option value="its.edu.net" > @its.edu.net </option>
                          <option value="itb.edu.net" > @itb.edu.net </option>
                          <option value="eepis-its.edu.net" > @eepis-its.edu.net </option>
                          <option value="adsl.medianet" > @adsl.medianet </option>
                          <option value="adsl.lintasarta" > @adsl.lintasarta </option>
                          <option value="adsl.interlink.id" > @adsl.interlink.id </option>
                        </select>
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

end
con t
int gpon-olt_<?php echo $replace->interface ; ?>
                  
no onu <?php echo $replace->port ; ?>
                  
!
int gpon-olt_<?php echo $replace->interface ; ?>
                  
onu <?php echo $replace->port ; ?> type HUAWEI-HG8245A sn <?php echo $replace->ont ; ?>

!
interface gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>
                  
name <?php echo $replace->username2 ; if($replace->username2 == NULL){echo $replace->username ; } ?> | <?php echo $replace->ont ; ?>                 
tcont 1 name SPEEDY profile UP-1M
tcont 2 name VOIP profile UP-1M
tcont 3 name USEETV profile UP-512K
gemport 1 name SPEEDY <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'unicast' ; } ?> tcont 1 
gemport 1 traffic-limit downstream DOWN-<?php echo $replace_profile->down ; ?>
                  
gemport 2 name VOIP <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'unicast' ; } ?> tcont 2
gemport 2 traffic-limit downstream DOWN-1M
gemport 3 name USEETV <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'unicast' ; } ?> tcont 3
gemport 3 traffic-limit downstream DOWN-6M
service-port 1 vport 1 user-vlan 200 vlan <?php echo $replace->vlan_inet ; ?>

service-port 2 vport 2 user-vlan <?php echo $this->uri->segment(5) ; ?> vlan <?php echo $this->uri->segment(5) ; ?>

service-port 3 vport 3 user-vlan 111 vlan 111
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'port-location format dsl-forum vport 1' ; }else{echo 'port-identification format DSL-FORUM-PON vport 1' ;} ?>   
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'dhcp-option82 enable vport 2' ; }else{echo 'pppoe-intermediate-agent enable vport 1' ;} ?>   
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'pppoe-plus enable vport 1' ; }else{echo 'dhcpv4-l2-relay-agent enable vport 2' ;} ?>   
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'igmp  fast-leave enable vport 3' ; }else{echo 'igmp fast-leave enable vport 3' ;} ?>   
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo '' ; }else{echo 'mvlan-translate 110 to 111 vport 3' ;} ?>   
!
pon-onu-mng gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

service HSI gemport 1 cos 0,1,2,3,4,5,6,7 vlan 200
service VoIP gemport 2 cos 0,1,2,3,4,5,6,7 vlan <?php echo $this->uri->segment(5) ; ?>

service IPTV gemport 3 cos 0,1,2,3,4,5,6,7 vlan 111
voip protocol sip
voip config method omci
voip-ip mode dhcp vlan-profile batchVlan<?php echo $this->uri->segment(5) ; ?>
 host 1
switchport-bind switch_0/1 veip 1
sip-service pots_0/1 profile  sipprofile_m10_b110 userid +62<?php echo $replace->username ; ?> username +62<?php echo $replace->username ; ?>@telkom.net.id password <?php echo $replace->password ; ?>

<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'multicast vlan add vlanlist 110' ; }else{echo 'mvlan 110' ;} ?>                     
vlan-filter-mode veip 1 tag-filter transparent untag-filter transparent
ex-vlan veip 1 input-tpid 0x8100 output-tpid 0x8100 down-mode inverse-upstream
ex-vlan-table veip 1 rule vlan200 treat remove1-add200
!
                  
igmp mvlan 110 receive-port gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?> vport 3
                  
end
                                    
sho gpon rem wan-i gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

sho pon p at gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

sho gpon rem voip-i gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

sho gpon rem voip-l gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

sho mac vlan <?php echo $this->uri->segment(5) ; ?> sta
                </textarea>
            </div>
            <div class="col-md-12" >
                <textarea style="width : 0px ; height : 0px ; " id="ZTE">
End                  
Con t
int gpon-olt_<?php echo $replace->interface ; ?>
                  
no onu <?php echo $replace->port ; ?>
                  
!
int gpon-olt_<?php echo $replace->interface ; ?>
                  
onu <?php echo $replace->port ; ?> type ZTEG-F609  sn  <?php echo $replace->ont ; ?>

!
int gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

name <?php echo $replace->username2 ; if($replace->username2 == NULL){echo $replace->username ; } ?> | <?php echo $replace->ont ; ?>                 
tcont 1 name VOIP profile UP-1M
tcont 2 name SPEEDY profile UP-<?php echo $replace_profile->down ; ?>
                  
tcont 3 name USEETV profile UP-512K
gemport 1 name VOIP <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'unicast' ; }else{echo '' ;} ?> tcont 1 <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'dir both' ; }else{echo '' ;} ?> 
gemport 1 traffic-limit downstream DOWN-1M
gemport 2 name SPEEDY <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'unicast' ; }else{echo '' ;} ?> tcont 2 <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'dir both' ; }else{echo '' ;} ?> 
gemport 2 traffic-limit downstream DOWN-<?php echo $replace_profile->down ; ?>
                  
gemport 3 name USEETV <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'unicast' ; }else{echo '' ;} ?> tcont 3 <?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'dir both' ; }else{echo '' ;} ?>

gemport 3 traffic-limit downstream DOWN-6144K
service-port 1 vport 1 user-vlan <?php echo $this->uri->segment(5) ; ?> vlan <?php echo $this->uri->segment(5) ; ?>

service-port 1 description VOIP
service-port 2 vport 2 user-vlan <?php echo $replace->vlan_inet ; ?> vlan <?php echo $replace->vlan_inet ; ?>

service-port 2 description SPEEDY
service-port 3 vport 3 user-vlan 111 vlan 111
service-port 3 description USEETV
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'port-location format dsl-forum vport 2' ; }else{echo 'port-identification format DSL-FORUM-PON vport 2' ;} ?>

<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'dhcp-option82 enable vport 1' ; }else{echo 'dhcpv4-l2-relay-agent enable vport 1' ;} ?>

<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'pppoe-plus enable vport 2' ; }else{echo 'pppoe-intermediate-agent enable vport 2' ;} ?>

<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'pppoe-plus trust true replace vport 2' ; }else{echo 'pppoe-intermediate-agent trust true replace vport 2' ;} ?>

!
pon-onu-mng gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

service VOIP gemport 1 vlan <?php echo $this->uri->segment(5) ; ?>

service SPEEDY gemport 2 vlan <?php echo $replace->vlan_inet ; ?>

service USEETV gemport 3 vlan 111
voip protocol sip
voip-ip mode dhcp vlan-profile batchVlan<?php echo $this->uri->segment(5) ; ?> host 2
wan-ip 1 mode pppoe username <?php echo $replace->username2 ; ?>@<?php echo $this->uri->segment(7) ; ?> pas <?php echo $replace->password2 ; ?> vlan-profile wan<?php echo $replace->vlan_inet ; ?> host  1
sip-service pots_0/1 profile  sipprofile_m10_b110 userid +62<?php echo $replace->username ; ?>  username +62<?php echo $replace->username ; ?>@telkom.net.id pass <?php echo $replace->password ; ?>

vlan port eth_0/4 mode hybrid def-vlan 111
dhcp-ip ethuni eth_0/4 from-internet
<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'multicast vlan add vlanlist 110' ; }else{echo 'mvlan 110' ;} ?>

<?php if($replace->vlan_inet == 3215 || $replace->vlan_inet == 1326 || $replace->vlan_inet == 3233 ){echo 'multicast vlan tag-strip port eth_0/4 enable' ; }else{echo 'mvlan tag eth_0/4 strip' ;} ?>

wan 1 service internet host 1
!
igmp mvlan 110 receive-port gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?> v 3

end
sho gpon rem wan-i gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>


sho gpon rem voip-i gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>

sho gpon rem voip-l gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>
                  
sho pon p at gpon-onu_<?php echo $replace->interface ; ?>:<?php echo $replace->port ; ?>
                  
sho mac vlan <?php echo $this->uri->segment(5) ; ?> sta                  
                </textarea>
                <textarea style="width : 0px ; height : 0px ; " id="ALC">
configure equipment ont interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?> admin-state down
configure equipment ont no interface  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>
                  
exit all          
                  
configure equipment ont interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?> sw-ver-pland <?php if(substr($replace->ont,0,2) == "FA"){ echo "3FE54869ACEC29" ; }elseif(substr($replace->ont,0,2) == "B1" || substr($replace->ont,0,2) == "B2"){ echo "3FE46606BFHB21" ; }else{ echo "3FE56557CFEA02" ; } ?>  sernum  ALCL:<?php echo $replace->ont ; ?> subslocid WILDCARD sw-dnload-version auto  plnd-var SIP voip-allowed iphost cvlantrans-mode local
configure equipment ont interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?> admin-state up
configure equipment ont slot <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1 planned-card-type 10_100base plndnumdataports 8 plndnumvoiceports 0 admin-state up
configure equipment ont slot <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/2 planned-card-type pots plndnumdataports 0 plndnumvoiceports 2 admin-state up
configure equipment ont slot <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14 planned-card-type veip plndnumdataports 1 plndnumvoiceports 0 admin-state up
exit all

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14/1 upstream-queue 0 bandwidth-profile name:UP-1536K
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14/1 queue 0 shaper-profile name:DOWN-15360K
configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14/1 admin-up
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14/1 max-unicast-mac 4
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14/1 vlan-id 881  tag single-tagged vlan-scope local network-vlan <?php echo $replace->vlan_inet ; ?>
                  
configure veip ont <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/14/1 domain-name <?php echo $replace->username2 ; ?>@<?php echo $this->uri->segment(7) ; ?>
                  
configure ntp ont <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?> key <?php echo $replace->password2 ; ?>
                  
exit all

configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/voip queue [0...3] shaper-profile name:DOWN-1M
configure qos interface <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/voip upstream-queue 0 bandwidth-profile name:UP-1M
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/voip
configure bridge port <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/voip vlan-id <?php echo $replace->vlan_voip ; ?>
                  
configure bridge port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/voip pvid <?php echo $replace->vlan_voip ; ?>
                  
configure bridge port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/vuni max-unicast-mac 4
configure iphost ont ont:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1 dhcp enabled vlan <?php echo $replace->vlan_voip ; ?>
                  
configure iphost ont ont:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1 admin-state up
configure voice ont voip-config ont:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1 protocol sip 
configure voice ont sip-config ont:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1 proxyserv-prof 20 outproxyserv-prof 20 aor-host-prt-prof 21 registrar-prof 24 
configure voice ont voice-sip-port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/2/1 user-aor +62<?php echo $replace->username ; ?> display-name +62<?php echo $replace->username ; ?> val-scheme md5-digest user-name +62<?php echo $replace->username ; ?>@telkom.net.id password plain:<?php echo $replace->password ; ?> realm <?php echo $this->uri->segment(7) ; ?>.id voice-mail-prof none ntwk-dp-prof 13 app-serv-prof 8 ac-code-prof 2  
configure voice ont voice-port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/2/1 voipconfig sip voip-media-prof 3 admin-state unlocked
exit all

configure interface port uni:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4 link-updown-trap admin-up
configure qos interface  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4 upstream-queue 0 bandwidth-profile name:UP-1536K
configure qos interface  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4 queue [0...3] shaper-profile name:DOWN-6144K
configure bridge port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4 max-unicast-mac 4
configure bridge port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4 vlan-id 111
configure bridge port  <?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4 pvid 111
configure igmp channel vlan:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4:111 max-num-group 10
configure igmp channel vlan:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4:111 fullview-packages [1]
configure igmp channel vlan:<?php echo $replace->interface ; ?>/<?php echo $replace->port ; ?>/1/4:111 preview-packages ""[1...1024]""
exit all
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
