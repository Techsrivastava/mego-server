    <?php
    $emp_id=$this->uri->segment(3);
    ?>
     <section class="content-header" style="background-color:#FFF !important;padding: unset;">

        <div class="row"><!-- row -->
         <div class="col-md-12  col-lg-12 col-xs-12  col-sm-12 text-center">
          <h1 style="margin:unset;" >
        DISTRIBUTOR AGREEMENT
 
      </h1>
   
        </div><!-- row -->
      </div>       
    </section>
    <section class="content" style="height:8600px !important;" >
       <div class="col-md-2">
       </div>
		         <div class="col-md-8" >
          <div class="box box-warning">
    <div class="box-body"> 
    <div class="row">

    <div class="col-md-12   col-xs-12 col-sm-12 ">

<p class="text-center">This Distributor Agreement (&lsquo;Agreement&rsquo; hereinafter) is executed on  &shy;&shy;&shy;<?php echo $rkdated=date("d F,Y",strtotime($empdata->PR_AGGREMENT_DATE));  ?> at New Delhi.</p>

<p class="text-center"><strong>by and between</strong></p>

<p><strong>Lava International Limited,</strong> a Company incorporated under the provisions of the Companies Act, 1956 and having its Registered office at <strong>C-7/227, Sector 7, Rohini, Delhi-110085</strong><strong>, </strong>India and having its corporate office at <strong>A-56, Sector -64, Noida-201301</strong> (hereinafter referred to as <strong>&ldquo;Company&quot; </strong>which expression unless repugnant to the subject or context, shall mean and include its successors-in-interest and assigns) of the <strong>ONE PART;</strong></p>
<p class="text-center"><strong>And</strong></p>

<p><strong><?php echo $empdata->PR_NAME; ?></strong> a <?php echo $empdata->PR_FIRM_TYPE; ?> Firm under the above said name and style and having its Place of Business / Registered Office at <strong> <?php echo $empdata->PR_PRESENT_ADDRESS; ?>,<?php echo $empdata->PR_PRESENT_PINCODE; ?> </strong> duly represented by 
<?php
$emcount=COUNT($directorData);
$ddta="";
for($i=0; $i<$emcount; $i++) 
{
 if($i=='0')
 {
  $ddta="<strong>".$directorData[$i]->PR_TITLE."</strong>&nbsp;<strong>".$directorData[$i]->PR_NAME."</strong>";
 }
 else
 {
  $ddta=$ddta." &nbsp;and&nbsp; <strong>".$directorData[$i]->PR_TITLE."</strong>&nbsp;<strong>".$directorData[$i]->PR_NAME."</strong>";
 }
}
echo $ddta;
?>




  the Partners of the abovesaid concern, hereinafter referred to as <strong>&quot; Distributor&rdquo; &quot;</strong> which expression unless repugnant to the subject or context, shall mean and include its successors, assigns, authorised representatives and administrators) of the <strong>OTHER PART.</strong></p>


<p>Whereas &ldquo;Company&rdquo; and &ldquo;Distributor&rdquo; are hereinafter referred to individually as &ldquo;Party&rdquo; and collectively as &ldquo;Parties&rdquo;</p>



<p><strong>WHEREAS</strong> COMPANY is engaged in the business of trading, manufacturing and distribution of mobile handsets under the brand name &ldquo;LAVA&rdquo;.</p>



<p><strong>WHEREAS</strong> the Distributor has approached COMPANY and have expressed its keen desire to be appointed as one of the Distributor of COMPANY to undertake the job of promoting and marketing of mobile handsets and other related services being provided by COMPANY under its brand name of &ldquo;LAVA&rdquo; to the potential Customers. The DISTRIBUTOR has also represented that it has necessary infrastructure, manpower and experience in the above area and possess the financial capabilities to perform the above functions and such other functions as may be assigned to it by COMPANY from time to time.</p>



<p><strong>NOW THIS AGREEMENT WITNESSETH THE TERMS AND CONDITIONS DETAILED HEREUNDER</strong></p>



<p><strong>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DEFINITIONS</strong></p>



<p><strong>1.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Area of Operation&rdquo; </strong>shall mean territory partly or wholly, or any other area as communicated by the Company to the &nbsp;&nbsp;Distributor in writing from time to time for promotion and marketing of its products.&nbsp;</p>

<p><strong>1.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Agreement&rdquo; </strong>shall mean this Distributorship Agreement, and shall include any amendment agreement, modifications, alterations, additions or deletions thereto agreed between the Parties in writing after execution of this Agreement.</p>

<p><strong>1.3</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;<strong>Confidential Information</strong>&rdquo; shall mean all information, whether proprietary or not, that the COMPANY may disclose to the &nbsp;&nbsp;Distributor shall include:</p>

<ul>
  <li>All information and data which is obtained or has been obtained whether in writing, pictorially, in machine readable form or orally, including but without limitation, financial information, know-how, processes, ideas, (whether patentable or not), schematics, trade secrets, technology, network architecture, customer lists (potential or actual) and other customer-related information, supplier information, sales statistics, market intelligence, marketing and other business model/ strategies and other commercial information;</li>
</ul>

<p>But shall not include those information which &ndash;</p>

<ul>
  <li>On the Effective Date is already in the possession or knowledge of the &nbsp;&nbsp;Distributor, not subject to any duty of confidentiality;</li>
  <li>On the Effective Date or subsequently, is or becomes public otherwise than by reason of a breach by the &nbsp;&nbsp;Distributor or any of its employees, affiliates, employees of affiliates, or professional advisers, of the terms of this Agreement; or</li>
  <li>Is approved for release by written authorization from the COMPANY.</li>
</ul>

<p><strong>1.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Effective Date&rdquo;</strong> shall means <?php echo $rkdated=date("d F,Y",strtotime($empdata->PR_AGGREMENT_DATE));  ?> </p>

<p><strong>1.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Party&rdquo; </strong>shall mean the COMPANY or the &nbsp;&nbsp;Distributor individually, as the context demands and <strong>&ldquo;Parties&rdquo; </strong>shall mean the COMPANY and the &nbsp;&nbsp;Distributor collectively.</p>

<p><strong>1.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Products&rdquo; </strong>shall mean:</p>


    <ol>
      <li>Mobile Handsets;</li>
      <li>spare parts of Mobile Handsets; and</li>
      <li>Such other accessories, Products that the Company, may specify from time to time.</li>
    </ol>
  

<p><strong>1.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Purchase Order&rdquo; </strong>shall mean the purchase order issued by the Distributor for purchase of the Products.</p>

<p><strong>1.8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;The Distributor&rdquo; </strong>shall include the Distributor firm/ partnership firm/ company and its employees who shall be responsible for performance of the scope of work and other terms and conditions as defined in this Agreement.</p>


<p><strong>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TERM &amp; NATURE</strong></p>

<p>2.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This Agreement shall be valid for a period of 03 (three) years commencing from the effective date of this agreement, unless terminated earlier in terms of this Agreement. The Agreement shall be automatically renewed for a further period of one year each after expiry of each year thereafter.</p>



<p>2.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; It is expressly understood and agreed between the Parties that this Agreement does not create or constitute any employer and employee relationship. Nothing in this agreement shall constitute or be deemed to constitute a partnership between the parties hereto or be deemed to constitute the Distributor as agent of the company for any purpose whatsoever and the Distributor shall have no authority to bind the company or to make commitment to any third party on behalf of the Company The relationship between the parties hereto shall be of vendor and purchaser and shall be on- principal to principal basis.&nbsp;&nbsp;&nbsp;</p>



<p>2.3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The DISTRIBUTOR shall engage/appoint its own employees and shall supervise their work and disperse their wages and also maintain statutory records pertaining to its employee&rsquo;s viz. salary, leave etc., as stipulated by law. It is further agreed between the Parties that under no circumstances the employees of the DISTRIBUTOR shall be deemed/treated to be the employees of COMPANY.&nbsp; COMPANY shall not have any concern, connection or privity of contract with the employees engaged by the DISTRIBUTOR.&nbsp;</p>



<p>2.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; It is expressly agreed between the parties that this Agreement does not confer any exclusive right to the DISTRIBUTOR to market the mobile handsets nor does the Agreement give any territorial right to the DISTRIBUTOR. COMPANY expressly reserves its right to enter into similar arrangements with any other party (ies) to market and promote the mobile handsets. The company reserves the right to the market and sells its products directly in the territory of the distributor and also to appoint one or more Authorized Distributor in the territory of the appointed Distributor, who shall have no objection to the same.</p>



<p><strong>2.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; All documents executed between the Parties pursuant to the execution of this Agreement, in pursuance to the terms and conditions of this Agreement and all circulars and written directives (if any) issued by the COMPANY under this Agreement shall form an integral part of this Agreement.</strong></p>



<p><strong>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SCOPE OF SERVICES: </strong></p>



<p>3.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Distributor shall place the order for the company&rsquo;s product to the company&rsquo;s office / Offices as may subsequently be notified by the company from time to time on mail or through courier and the company shall supply the products to the distributor in accordance with such purchase orders at the price mentioned in the list released by the Company from time to time. All payments shall be made in the bank accounts of the company as may be notified by the Company from time to time through Cheque/ Demand Draft or Online Transfer.</p>



<p>3.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The distributor hereby undertakes and agrees with the company that it shall at all times during the subsistence of this agreement observe and perform the terms conditions set out in this agreement and :</p>



  <ol>
    <li>shall abide by all the policies of the company as may be released by the Company form time to time.</li>
     <li>Shall not sell to any person or body corporate, the products which they know or have reason to believe are intended for resale outside the Authorized Distributor zone.</li>
     <li>&nbsp;Shall not conduct any contest or promotional / Prize schemes in respect of the company&rsquo;s products without the prior written approval of the company.</li>
     <li>Shall not use the name or Trademark / logo of the company on the letterheads or otherwise except in the manner as may be approved by the company.</li>
     <li>Shall not assign or purport to assign the rights and obligations of this agreement to any third party without the prior consent of the company in writing.</li>
  </ol>
  



<p>3.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Distributor shall, at all times, during the continuance of this agreement, offer for sale and sell the product of the company in according to the specification supplied by the company to the Distributor form time to time, either generally or in any particular case, and shall not make any representation or give any warranty in respect of the products other than those contained in the company&rsquo;s warranty policy. The distributor shall keep the company indemnified against all losses, damages or claims that may arises out of any authorized representations made by the Distributors on behalf of the company. The company shall not be responsible for any act or default of the Distributor employees or representative.</p>



<p>3.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To maintain stocks of products in such quantity as specified by COMPANY from time to time to meet Distributor&rsquo;s target as assigned by the company from time to time.&nbsp;</p>



<p>3.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To directly manage, administer, control and conduct its business and not to sub-delegate it to any other person/party without obtaining prior written approval of the COMPANY.</p>



<p>3.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To identify the potential Subscribers/s and promote the sales of Products of the Company.</p>



<p>3.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To promote the business interests of COMPANY.</p>



<p>3.8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To assist COMPANY in various promotional activities identified and launched by COMPANY from time to time.</p>



<p>3.9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To assist in the Company in marketing/advertise the products or other related services of COMPANY.&nbsp;</p>



<p>3.10&nbsp;&nbsp;&nbsp; To supply periodical reports, returns and other information relating to the business, market conditions, taste and preferences of the end customers and/or any such other information as may be of interest to COMPANY as desired by COMPANY.</p>



<p>3.11&nbsp;&nbsp;&nbsp; To maintain proper books of accounts and records in safe custody relating to products, Customer data, receipts issued for the amount collected from the Customers and such other documents as may be prescribed by COMPANY from time to time or as may be required to be maintained under any applicable laws. DISTRIBUTOR shall also permit inspection of all said documents by the COMPANY or any other agency duly nominated by COMPANY.</p>



<p>3.12&nbsp;&nbsp;&nbsp; To provide such other services as may be desired by COMPANY from time to time with regard to promotion and marketing of the products of the Company.&nbsp;</p>



<p>3.13 &nbsp;&nbsp; The DISTRIBUTOR expressly warrants not to:</p>



<p>(i) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Make any promise, representation, or to give any warranty or guarantee with respect to the Products, which are not authorised by COMPANY.</p>



<p>(ii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Do or omit to do any act to bind COMPANY or fasten any legal obligation on COMPANY, which has not been authorised by COMPANY.</p>



<p><strong>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INFRASTRUCTURE &amp; OBLIGATIONS OF DISTRIBUTOR</strong></p>



<p>4.1 &nbsp;&nbsp; DISTRIBUTOR shall solicit business and market and promote the handsets from the place of its business as mentioned above in this agreement or any other place as may be communicated by the Distributor to the Company in writing, and shall maintain the same as per the norms/ guidelines issued by COMPANY from time to time.</p>



<p>4.2&nbsp;&nbsp;&nbsp; The DISTRIBUTOR shall provide the following facilities from said outlet/ premises and have obligations as stated hereunder at its cost:</p>



<ol>
  <li>DISTRIBUTOR shall not shift its place of business or modify the said premises without the prior written permission of COMPANY.</li>
  <li>DISTRIBUTOR shall install and maintain telephone connection(s), Fax Machine/s, Computer, E-Mail, office stationary and such other equipments including safe vault and facilities as deemed fit and necessary by COMPANY and intimated to the DISTRIBUTOR from time to time. DISTRIBUTOR shall also procure and install such software as intimated by COMPANY from time to time for efficient and proper performance of its obligations under this agreement.</li>
  <li>It is expressly agreed by DISTRIBUTOR that the maintenance of said premises and its day-to-day running expenses including any electricity charges, water charges shall be the sole responsibility of DISTRIBUTOR and shall be borne by DISTRIBUTOR.</li>
   <li>DISTRIBUTOR shall be solely responsible at its own cost for obtaining all necessary registrations, approvals, sanctions, permissions, licenses for the operation and maintenance of the premises and for the conduct of its business from any Municipal, Local or Government Authority/ies or any other statutory body.</li>
     <li>DISTRIBUTOR shall ensure registration and cover its business establishment under the Employees State Insurance Act and Employees Provident Fund (Miscellaneous Provisions) Act and other applicable laws, secure its own code number and remit contributions in respect of its employees and personnel&rsquo;s engaged/employed by the DISTRIBUTOR. The COMPANY in any case shall not be liable to incur no liability in this regard and the DISTRIBUTOR shall keep COMPANY indemnified against any claims raised on COMPANY by any statutory authority/ies in this regard.&nbsp;&nbsp;</li>
      <li>The Distributor shall keep and maintain his own warehouse and shall always maintain safety stock as may be prescribed by the Company from time to time to meet the business requirement ofall its dealers/ retailers in the Territory.</li>
  <li>The Distributor to ensure outlet placement &amp; service frequency as prescribed by COMPANY</li>
  <li>The Distributor shall appoint dedicated manpower as per norms as defined in COMPANY policy, duly equipped with conveyance facility in case of sales/Delivery manpower.</li>
  <li>Company may inspect the market stock situation at any time at its sole discretion, and if the Distributor is found to be selling the products out of official fixed area on agreement or online selling activity, than the company shall be entitled to impose such penalty and take such necessary action as per the Company&rsquo;s policy without prejudice to its right of termination of the Agreement with immediate effect.</li>
  <li>The distributor has to issue No dues Certificate to company and shall upload the same on the portal of the Company on the date of each month as specified by the company. The Distributor shall not be entitled to raise any claim post submission of No dues Certificate for the preceding month.</li>
  <li>DISTRIBUTOR shall always agree to and follow all future changes in COMPANY business model as may be decided from time to time.</li>
</ol>



<p>4.3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; As specified by COMPANY from time to time, DISTRIBUTOR shall maintain stock of Point Of Purchase (POP) material or any other printed material, advertisement material, etc. (hereinafter referred to as <strong>&lsquo;Product&rsquo;</strong>) which is used for the purpose of promotion and marketing of the handsets.&nbsp; All products shall have COMPANY logo and shall be printed only after specific written approval of COMPANY. However, all the tax liability as applicable from time to time with respect to Point of Purchase (POP) material shall be borne by DISTRIBUTOR.</p>



<p>4.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; COMPANY shall not be liable for any loss, pilferage or damage to the Products and/or other products stored at the outlet/ premises of DISTRIBUTOR and any loss, damage or pilferage caused to such items shall be on the sole account of the DISTRIBUTOR.</p>





<p>4.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall release any advertisement in respect of products only after due consultation and prior written approval of COMPANY.</p>



<p><strong>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>ADDITIONAL SUPPORT</strong></p>



<p>5.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; COMPANY shall provide necessary support in terms of training of employees/staff of DISTRIBUTOR and provide necessary literature, documents, papers and specimen reports/ statements etc. to enable DISTRIBUTOR to perform effectively.</p>



<p>5.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; COMPANY shall provide additional support by supplying appropriate quantity of Service literature, POP material, promotional items, etc.&nbsp; COMPANY and the DISTRIBUTOR may from time to time also carry out joint and co-operative advertisement and other promotional activities in respect of the handsets.&nbsp; The budget for such promotional activities and the ratio of sharing between COMPANY and the DISTRIBUTOR shall be intimated to the DISTRIBUTOR and the budget shall be taxable under GST/CGST. The DISTRIBUTOR undertakes to fully utilize the budgeted target as intimated by COMPANY. On effect of termination, such POP/advertisement/promotional items/furniture fixture etc. needs to be return back to Company. &nbsp;</p>



<p>5.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; COMPANY agrees to provide marketing support in accordance with COMPANY&rsquo;s prevalent policies in this regard.</p>



<p><strong>6. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PERFORMANCE ASSESMENT </strong></p>

<p>The Company shall carry out performance assessment of the Distributor on monthly and quarterly basis during the term of this agreement as per performance management policy of the Company. The performance of the Distributor shall be the sole criteria for determination of the continuation or discontinuation of this Agreement. In case the Distributor is not able to perform or achieve the targets as per the performance criteria of the Company, the Company may discontinue the Agreement at its sole discretion.</p>



<p><strong>7. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAYMENT TERMS</strong></p>



<p>7.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; As per the Company Policy the Distributor shall be liable to pay 100% amount to the Company in advance before or at the time of placing any Purchase order.</p>



<p>7.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Distributor shall keep a security deposit of Rs 25,000/- or any other sum as may be specified by the company from time to time, to the company for securing the due performance of the obligations on the part of the Distributor. Security deposit to be adjusted from amounts payable against the first bill issued by the Company to Distributor.</p>



<p>7.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Material shall be released only upon the realisation of the advance payment and the Security Deposit in the accounts of the Company.&nbsp;</p>



<p><strong>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TAX AND COMPLIANCES</strong></p>



<p>8.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The distributor shall bear the exclusive responsibility to provide GSTIN certificate alongwith address where the goods are required to be delivered by Company. The company shall not be responsible for any credit loss due to wrong/incomplete details provided by the Distributor related to GSTIN certificate.</p>



<p>8.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Company shall be entitled to recover applicable taxes from Distributor wherever any late fee, interest or penalty is charged to company for delay in payment consideration or otherwise.</p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

<p>8.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The distributor shall not make any amendment in relation to the outward supply transaction of the Company on the GSTIN portal without prior approval of the company in writing.&nbsp; Further, where such changes are made on the GSTN portal without prior approval the same shall be liable to be rejected / not acted upon by the Company.</p>



<p>8.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The distributor shall be responsible for undertaking necessary compliance to enable Company or its Transporter to generate the e-way bill within reasonable time.&nbsp;The distributor shall also ensure that e-way bill is duly accepted by the receipt of goods (consignee).&nbsp; Any loss/ tax/ penalty/ interest/ any amount payable / paid by Company or its Transporter due to non-compliance/ confiscation of the consignment shall be payable/ indemnified by the distributor.&nbsp;Any legal cost, expenses incurred in this regard shall also be indemnified by the distributor.</p>



<p>8.5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Company will provide discounting schemes related to sale of goods, which shall be communicated from time to time as per the schemes decided and issued by Company and the same shall be construed as a part of this agreement. Company shall issue the credit notes as per the discounts issued from time to time on net of GST concept&rdquo;.</p>



<p>8.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Distributor shall ensure that goods are returned (with priority approval) within specified time period, otherwise Company would issue the credit note without tax component. No adjustment of credit note shall be available after 30th day September following the end of the financial year in which the supply was made or date of filling of relevant annual return. Distributor would be required to reverse the input tax credit on account of credit note issued by the Company. In case any loss due to non-compliance by the Distributor, the Distributor shall be indemnify Company for such losses&rdquo;</p>

<p><strong>9. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SALES AND SERVICE DISTRIBUTION &ldquo;SSD&rdquo;</strong></p>



<p>9.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The company may, at its sole discretion, appoint the Distributor to provide SSD Services to the Customers of the company.</p>

<p>9.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; If the Distributor is appointed by the company to provide the aforesaid services, the Company may enter into a separate agreement namely &ldquo;SSD Agreement&rdquo; with the Distributor and the Distributor shall act in accordance with the terms &amp; conditions as specified in the Said SSD Agreement.</p>

<p>9.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The SSD agreement shall be coterminous with this Distributorship Agreement; however, termination of the SSD agreement shall not affect in any way the validity of this Distributor agreement.</p>





<p><strong>10.&nbsp; &nbsp;&nbsp;&nbsp; TERMINATION</strong></p>



<p><strong>10.1<em>&nbsp;&nbsp;&nbsp; </em>(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Either party may terminate the agreement by giving 15 days&rsquo; notice to other party in writing, without assigning any reason whatsoever.</strong></p>



<p>(ii)&nbsp;&nbsp;&nbsp;&nbsp; Either party shall have the right to terminate this Agreement forthwith after giving notice thereof to the other party, in the event of the following:</p>



<ol>
  <li>Insolvency of the other Party or if the audited financial results of the business of the other party discloses that the total liabilities of the business of the other party exceeds all its assets.</li>
  <li>If the other party enters into an arrangement or composition with its creditor(s) or if a Receiver of the other party&rsquo;s property or any part thereof, is appointed.</li>
  <li>If a resolution is passed to wind-up the other party&rsquo;s business or if a Receiver is appointed for any part of the other party&rsquo;s property.</li>
    <li>Failure of the other party to obtain or maintain any license or the suspension or revocation of any license necessary for the conduct of the business of the other party pursuant to this Agreement.</li>
</ol>






<p>&nbsp;(iii)&nbsp;&nbsp; Notwithstanding what is stated herein above, COMPANY shall have the sole right to terminate this Agreement forthwith by giving notice in writing addressed to the DISTRIBUTOR at its last known address, in case of happening or occurrence of events including but not restricted to the following:</p>



<p>a)&nbsp; Breach of any of the terms or conditions of this Agreement or non performance by DISTRIBUTOR and such breach/ non performance is not cured within 07 days of notice by COMPANY.</p>



<p>b)&nbsp; Prosecution for any criminal offence, committed by any of the partner/s, director/s, sole proprietor etc. of DISTRIBUTOR.</p>



<p>c)&nbsp; False claims towards refunds, credits, warranty claims, false financial information reports or any other data including but not limited to reporting requirements of COMPANY.</p>



<p>d) If DISTRIBUTOR has any overdue payments towards COMPANY during the subsistence of this Agreement.</p>



<ol>
  <li>If the appointment or continuance of DISTRIBUTOR under this Agreement is likely to result, at the sole decision of COMPANY, in loss of goods shall or reputation of COMPANY.</li>
   <li>If DISTRIBUTOR commits any misconduct, fraud, cheating, misappropriation or any act lacking in good faith.</li>
</ol>




<p>(iv)This Agreement shall be terminated if either party is unable to fulfill its obligations hereunder for a continuous period of 60 days from the notice date so given by the affected party, for any reason arising out of the happening and occurrence of Force Majeure events</p>



<p>10.2&nbsp;&nbsp;&nbsp; <strong>Automatic Termination:</strong> If the Distributor fails to get billing done for a period of 07 Days continuously, the Distributor shall give reasons for non-billing within 03 days after the date of receipt of intimation from the Company to the Distributor regarding non-billing. On receipt of the information from the Distributor, the company may, at its sole discretion, if the company deems that there is sufficient reason for non-billing, it may further allow a period of 05 days to the Distributor to get the billing done in normal course.</p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; However, if the Distributor fails to get the billing done within the time period as allowed by the company or within 05 days from the date of intimation by the company to the Distributor for non-billing (Whichever is earlier), the Agreement shall stand terminated automatically with immediate effect, and F&amp;F process of the Distributor shall be initiated by the company.</p>



<p>10.3&nbsp;&nbsp;&nbsp; COMPANY shall not be liable to DISTRIBUTOR in any manner for any damages or claims or compensation of any nature whatsoever by reason of cancellation or termination of this Agreement or for any other reason, whatsoever.</p>



<p><strong>11.&nbsp; &nbsp;&nbsp;&nbsp; EFFECTS OF TERMINATION</strong></p>



<p>11.1&nbsp;&nbsp;&nbsp; Notwithstanding any other rights and remedies provided elsewhere in the agreement, on termination of this agreement:</p>



<p>i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DISTRIBUTOR or its employees or agents shall not represent COMPANY in any of its dealings.&nbsp; DISTRIBUTOR shall not intentionally or otherwise commit any act or acts that would make a third party to believe that DISTRIBUTOR is still COMPANY&rsquo;s Distributor or marketer of its handsets.</p>



<p>ii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall within 7 days of termination, settle all the outstanding dues of COMPANY, arrange to return all the documents and properties of COMPANY or cost thereof.</p>



<p>iii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall stop using the name, trade marks, logos etc of COMPANY in any audio or visual form with immediate effect.</p>



<p>iv)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The expiration or termination of the Agreement for any reason whatsoever shall not affect any obligation of either party having accrued under this Agreement prior to the expiration or termination of the Agreement and such expiration or termination shall be without prejudice to any liabilities of either party to the other party existing at the date of expiration or termination of the Agreement.</p>



<p><strong>12.&nbsp; &nbsp;&nbsp;&nbsp; INTELLECTUAL PROPERTY RIGHTS</strong></p>



<p>12.1&nbsp;&nbsp;&nbsp; DISTRIBUTOR agrees that any Trade Mark/s, Logo/s, Trade Name/s or Identifying Slogans of the COMPANY) (hereinafter collectively referred to as &ldquo;the Trademarks&rdquo;), which are the property of COMPANY, cannot be used by the DISTRIBUTOR, its employees, agents, if any, for any purpose which is not authorised by COMPANY and shall always be used as per directions issued in writing by COMPANY from time to time.</p>



<p>12.2&nbsp;&nbsp;&nbsp; In the event of termination of this Agreement for whatsoever cause, DISTRIBUTOR&rsquo;s right to use any Trademarks shall cease immediately.</p>



<p>12.3&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall not publish, nor cause to be published any advertisement or make any representations oral or written which might confuse, mislead or deceive the public which are detrimental to the Trademarks or the reputation of COMPANY.</p>



<p>12.4&nbsp;&nbsp;&nbsp; COMPANY may withdraw the permission for the usage of the Trademarks belonging to COMPANY at any time during the subsistence of this Agreement.</p>



<p>12.5&nbsp;&nbsp;&nbsp; In relation to any software supplied by COMPANY to DISTRIBUTOR hereunder, DISTRIBUTOR expressly acknowledges that all intellectual property rights in such software are and shall remain the property of COMPANY or a third party licensor as the case may be. Furthermore, DISTRIBUTOR agrees that it shall take all steps necessary to protect these intellectual property rights and to comply with such requirements in this regard as COMPANY may from time to time impose.</p>



<p><strong>13.&nbsp; &nbsp;&nbsp;&nbsp; NON COMPETITION</strong></p>



<p>DISTRIBUTOR acknowledges that the business of selling handsets is extremely competitive and exists in an ever expanding market. DISTRIBUTOR agrees and acknowledges that during the term of this Agreement it shall not undertake any of the activity/ies under this Agreement for any other manufacturer of handsets or any similar competitive business.&nbsp; DISTRIBUTOR shall not carry on any business or other activity, which is in competition with the functions, responsibilities and obligations of DISTRIBUTOR under this Agreement directly or through any other entity wherein DISTRIBUTOR and/or its Directors/ partners have any interest.</p>



<p><strong>14.&nbsp; &nbsp;&nbsp;&nbsp; FORCE MAJEURE</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Neither party to this Agreement shall be liable for breach of this Agreement or non-performance of their obligations hereunder to the extent caused by or arising from prohibition or restriction by law or regulation of any Government, fire, flood, storms, weather, accident, riots, acts of God or other events beyond the control of the Parties. (&lsquo;Force Majeure events&rdquo;).</p>



<p><strong>15.&nbsp; &nbsp;&nbsp;&nbsp; INDEMNIFICATION</strong></p>



<p>DISTRIBUTOR shall indemnify and shall always keep the COMPANY indemnified against all costs, actions, claims, losses, damages, suits, prosecutions, including all liquidated losses, consequential losses and legal fees which COMPANY may suffer/ incur on account of the Distributor&rsquo;s failure to comply in whole or in part of any of the terms and conditions of this Agreement.</p>



<p><strong>16. &nbsp;&nbsp;&nbsp;&nbsp; CONFIDENTIALITY</strong></p>



<p>DISTRIBUTOR, its employees, associates and agents may, during the period of this Agreement, have access to any information or data including but not limited to the COMPANY&rsquo;s technical information, or information about COMPANY&rsquo;s policies and operations which are of a confidential nature (hereinafter referred to as (<strong>&ldquo;confidential information&rdquo;</strong>). DISTRIBUTOR, its employees, associates or agents shall not disclose/share such confidential information/ data to any third party during the subsistence of this Agreement and for a period of <strong>3 (three) years</strong> from the date of termination of this Agreement.</p>



<p><strong>17.&nbsp;&nbsp;&nbsp; ENTIRE AGREEMENT</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This agreement constitutes the entire agreement between the Parties and supersedes all oral and written representations and agreements between the Parties including, but not limited to any earlier agreement relating to the subject matter thereof or any other agreement between the Parties in relation to the subject matter hereof. However, this agreement shall not relieve the Parties from their respective rights and obligations against each other arising out of or in connection with any previous agreement.</p>

<h1>&nbsp;</h1>

<p><strong>18.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FAILURE TO ENFORCE</strong></p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

<p>The failure of either party to enforce at any time any of the provision of this agreement shall not be considered to be waiver of the right of such party thereafter to enforce each and every such provision.</p>



<p><strong>19.&nbsp;&nbsp; &nbsp;&nbsp; SEVERABILITY</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; If any provision of this agreement shall be found by any Government or administrative body of competent jurisdiction to be invalid or unenforceable, the invalidity or un-enforceability of such provision shall not affect the other provisions of this agreement and all provisions not affected by such invalidity or unenforceability shall remain in full force and effect.&nbsp; The Parties hereby agree to attempt to substitute for any invalid or unenforceable provision with a valid or enforceable provision, which achieves to the greatest extent possible the economic, legal and commercial objectives of the invalid or unenforceable provision.</p>



<p><strong>20.&nbsp;&nbsp;&nbsp; ASSIGNMENT</strong></p>



<p>Save as set out herein the DISTRIBUTOR shall not assign or purport to assign or otherwise deal with any of its rights and obligations hereunder, except with the express prior written consent of COMPANY.</p>



<p><strong>21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; STATUTORY COMPLIANCES</strong></p>



<p>21.1&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall comply with all applicable statutes like Provident Fund and Miscellaneous Provisions Act, Employees State Insurance Act 1948, Minimum Wages Act, Payments of Wages Act 1936, Indian Stamp Act 1899 etc.&nbsp; COMPANY shall not be liable in any manner whatsoever for any non-compliance on part of the DISTRIBUTOR of the applicable laws and in the event of any adverse claim of whatsoever nature arising thereof, the entire burden shall be strictly borne by the DISTRIBUTOR.</p>



<p>21.2&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall maintain all requisite records, registers, account books etc. which are obligatory under any applicable law in respect of its business and shall provide such information as may be required under any law to any authority.</p>



<p>21.3&nbsp;&nbsp;&nbsp; DISTRIBUTOR shall at all times indemnify and keep indemnified COMPANY against any/ all claims of/ by its employees including but not restricted to the claims under the Workmen Compensation Act, 1923; Payment of Wages Act; Payment of Bonus Act; Employees Provident Fund Act; Payment of Gratuity Act, Minimum Wages Act, Employees State Insurance Act or any other Act(s) or Statutory Modifications thereof or otherwise for or in respect of any claim for damage or compensation payable in consequence of any accident or injury sustained by any employee or&nbsp; other personnel of the DISTRIBUTOR or in respect of any claim, damage or compensation under Labour Laws or any other Laws or rules made there under, by any person whether in the employment of the DISTRIBUTOR or not.</p>



<p><strong>22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LIABILITY</strong></p>



<p>COMPANY shall not be liable to DISTRIBUTOR or any other party by virtue of termination of this Agreement for any reason whatsoever for any claim for loss or profit or on account for any expenditure, investment, leases, capital improvements or any other commitments made by DISTRIBUTOR in connection with their business made in reliance upon or by virtue of DISTRIBUTOR&rsquo;s appointment under this Agreement.</p>



<p><strong>23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHANGE IN CONSTITUTION</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This agreement has been entered into on the basis of the present constitution of DISTRIBUTOR&rsquo;s establishment as submitted to COMPANY.&nbsp; In future if there is any change proposed in the constitution of DISTRIBUTOR, the same shall be immediately informed to COMPANY and no change shall be affected unless approval of COMPANY is obtained in writing.&nbsp; In case the written consent is not provided, COMPANY at its sole discretion reserves the right to terminate this agreement by 15 days notice in writing.&nbsp; However, in the event of COMPANY agreeing to the changed constitution, DISTRIBUTOR shall ensure that the liabilities of the old establishment shall be honoured by the new establishment in addition to complying with all such formalities as may be intimated by COMPANY.</p>



<p><strong>24.&nbsp;&nbsp; &nbsp;&nbsp; CHANGES / MODIFICATION</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; COMPANY shall always have right to add, delete, amend or alter all or any of the terms and conditions of this agreement and such amended terms and conditions shall be binding on the DISTRIBUTOR as and when these are intimated to DISTRIBUTOR by way of letter, circular, notice or otherwise and even if DISTRIBUTOR has failed to send its acceptance letter giving acceptance specifically to the amended, altered, varied or deleted terms and conditions.</p>



<p><strong>25.&nbsp; &nbsp;&nbsp;&nbsp; NOTICE</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Any notice or other communication required or permitted to be given between the Parties under this agreement shall be given in writing at the addresses of the parties as mentioned earlier on the first page of this agreement or such other addresses as may be intimated by the parties in writing from time to time.</p>



<p><strong>26.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ARBITRATION</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In the event of any disagreement or disputes between the parties, arising in connection with this Agreement or its execution, the same shall be settled in an amicable manner and if no settlement could be reached within 30 days, the same shall be referred to the sole Arbitrator who shall be appointed by the &ldquo;Company&rdquo; in accordance with the Arbitration and Conciliation Act, 1996 or any other statutory amendment thereof. The place of arbitration shall be at Delhi. Any order, direction, award of the aforesaid Arbitrator shall be final and binding on both the parties.&nbsp;</p>



<p><strong>27.</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JURISDICTION OF COURTS</strong></p>



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The courts at Delhi alone shall have the exclusive jurisdiction in respect of the subject matter of this Agreement.</p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>


  <div class="col-md-6">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title" >For Lava International Limited</h3>
        </div>
        <div class="box-body">
          <div class="row ">
            <table border="0" cellpadding="1" cellspacing="1" style="margin-left:15px !important;">
                <tbody>
                  <tr>
                    <td><strong>NAME</strong></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>DESIGNATION</strong></td>
                    <td>&nbsp;</td>
                  </tr> 
                  
                </tbody>
              </table>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title ">For <?php echo $empdata->PR_NAME; ?></h3>
        </div>
        <div class="box-body">
          <div class="row ">
            <table border="0" cellpadding="1" cellspacing="1" style="margin-left:15px !important;">
                <tbody>
                  <tr>
                    <td style="width:600px;"><strong>NAME</strong></td>
                    <td style="width:600px"><strong>DESIGNATION</strong></td>
                  </tr>
                  <?php
                  foreach ($directorData as $didata) {
                  
                  ?>
                  <tr>
                    <td ><?php echo $didata->PR_TITLE; ?> <?php echo $didata->PR_NAME; ?></td>
                    <td ><?php echo $didata->PR_DIRECTOR_DESIG; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                 
                 
                </tbody>
              </table>

          </div>
        </div>
      </div>
    </div>
      <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" >WITNESSES</h3>
        </div>
        <div class="box-body">
          <div class="row ">
            <table border="0" cellpadding="1" cellspacing="1" style="margin-left:15px !important;">
                <tbody>
                 
                  <tr>
                    <td><strong>NAME</strong></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>ADDRESS</strong></td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>

          </div>
        </div>
      </div>
    </div>
     <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" >WITNESSES</h3>
        </div>
        <div class="box-body">
          <div class="row ">
            <table border="0" cellpadding="1" cellspacing="1" style="margin-left:15px !important;">
                <tbody>
                 
                  <tr>
                    <td><strong>NAME</strong></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>ADDRESS</strong></td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>

          </div>
        </div>
      </div>
    </div>


     <div class="col-md-12">
                <div class="form-group">
                  <p>Note<sup style="color: red;">*</sup> For any Query Please Contact us at :-info@samapark.com</p>

                <?php
                  $emp_id=$this->uri->segment(3); 
                ?>
                 <a href="<?php echo base_url('outer/acceptaggrement').'/'.$emp_id; ?>"><button type="submit" class="btn btn-success pull-right" >ACCEPT</button></a> 
                </div>
                </div>  


   
         
     
   
      </div></div></div></div>
         
      </div> </div>
     
    </section>
   
   