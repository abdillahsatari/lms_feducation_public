<h6 class="mb-0 text-uppercase">Referal Saya</h6>
<hr />

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status Member</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Regency/City</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($myTeam as $team){?>
                    <tr>
                        <td><?= $team->member_full_name?></td>
                        <td><?= $team->member_is_activated ? "Aktif":"Belum Aktif";?></td>
                        <td><?= $team->member_phone_number ?: "-" ?></td>
                        <td><?= $team->member_email?></td>
                        <td><?= $team->member_address ?: "-"?></td>
                        <td><?= date('d M Y ', strtotime($team->created_at)) ?></td>
                    </tr>
				<?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
