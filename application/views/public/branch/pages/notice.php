<div class="sptb bg-white">
   <div class="container">
      <div class="row">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Date</th>
                <th>Download</th>
              </tr>
            </thead>
            <tbody>
             <?php $i= 1; foreach ($this->Home_model->all_notice() as $notice) {?>
              <tr>
                <td><?= $i; ?></td>
                <td><a href="<?= base_url() ?>home/notice_detail/<?= $notice->id ?>" ><?= $notice->title ?></a></td>
                <td><?= $notice->date ?></td>
                <td><img src="<?= base_url() ?>upload/notice/pdf.png" alt="Los Angeles"></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
      </div>
   </div>
</div>
