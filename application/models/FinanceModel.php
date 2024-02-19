<?php

class FinanceModel extends CrudModel {

	private function comissionMember($memberId = NULL){
		if ($memberId){
			$queryCommission 	= "SELECT MC.id, MC.commission_member_id, MC.commission_ammount, 
									SUM(MC.commission_ammount) as total_comission 
									FROM member_commission MC 
									WHERE commission_member_id = $memberId GROUP BY MC.id";
		} else{
			$queryCommission 	= 'SELECT MC.id, MC.commission_member_id, MC.commission_ammount, 
									SUM(MC.commission_ammount) total_comission 
									FROM member_commission MC
									GROUP BY MC.id';
		}

		return $this->q($queryCommission);
	}

	private function withdrawalMember($memberId = NULL){

		if ($memberId){
			$queryWd 	= 'SELECT MW.id, MW.wd_member_id, MW.wd_amount, MW.wd_status, 
							SUM(MW.wd_amount) as total_wd 
							FROM member_withdrawal MW 
							WHERE MW.wd_member_id = "'.$memberId.'"
							AND MW.wd_status = "'.MemberWdStatus::WD_FINISHED.'"  
							GROUP BY MW.id';
		} else{
			$queryWd 	= 'SELECT MW.id, MW.wd_member_id, MW.wd_amount, MW.wd_status, 
							SUM(MW.wd_amount) total_wd 
							FROM member_withdrawal MW
							WHERE wd_status = "'.MemberWdStatus::WD_FINISHED.'"';
		}

		return $this->q($queryWd);
	}

	/**
	 *
	 *	Getter
	 *
	 * */

	public function memberFinance($memberId = NULL){

		$result = array();

		/**
		 *
		 *	Balance debit
		 *
		 **/
		$memberComission	= isset(current($this->comissionMember($memberId))->total_comission) ? current($this->comissionMember($memberId))->total_comission: 0;


		/**
		 *
		 *	Balance credit
		 *
		 **/
		$memberWithdrawal	= isset(current($this->withdrawalMember($memberId))->total_wd) ? current($this->withdrawalMember($memberId))->total_wd: 0;
		

		/**
		 *	Initiate result
		 *
		 *	Balance Debit: memberDeposit, memberPinjaman, tabunganImbalJasa, simpananImbalJasa, tabunganMemberTransfer (to walllet), simpananMember (when tenor is expired);
		 * 	Balance Credit: withdrawalMember, simpananMember, memberPinjamanDetail;
		 *
		 * */

		$memberBalance 	= ($memberComission - $memberWithdrawal);

		/**
		 * Wrapping all components
		 * */

		$dataBalance = new stdClass();

		$dataBalance->totalBalance		= $memberBalance;
		$dataBalance->totalComission	= $memberComission;
		$dataBalance->totalWithdrawal	= $memberWithdrawal;

		array_push($result, $dataBalance);

		return $result;
	}

}
