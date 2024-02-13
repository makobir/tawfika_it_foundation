<div class="card card-primary card-outline" style="width: 100%">   
   <form method="post" action="<?= base_url() ?>institute/formfillupnow">
   <div class="card-body">
      <div class="row">
         <div class="col-sm-6">
            <h3>Courier Details : </h3>
            <ol>
               <li>Sent Date : <?= $document->date; ?></li>
               <li>Courier Name & ID : <?= $document->name; ?></li>
               <li>Details : <?= $document->details; ?></li>
            </ol>
            <a class="btn btn-primary" href="<?= base_url() ?>courier/receive_now/<?= $document->sl; ?>">Recived</a>
         </div>
      </div>
   </div>
</form>