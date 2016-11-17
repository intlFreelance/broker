<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Producer;
use App\Models\ContractPayment;
use App\Models\Contract;

class ReportingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {
        $data['payments'] = Payment::all();
        return view('reports.payments',$data);
    }

    public function payment_export()
    {
      header("Content-Type: text/csv; charset=utf-8");
      $payments = Payment::all();
      $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
      $csv->insertOne(\Schema::getColumnListing('payments'));
      foreach ($payments as $payment) {
        $csv->insertOne($payment->toArray());
      }

      $csv->output('payments.csv');
    }

    public function producers()
    {
        $data['producers'] = Producer::all();
        return view('reports.producers',$data);
    }

    public function producers_export()
    {
      header("Content-Type: text/csv; charset=utf-8");
      $payments = Payment::all();
      $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
      $csv->insertOne(\Schema::getColumnListing('payments'));
      foreach ($payments as $payment) {
        $csv->insertOne($payment->toArray());
      }

      $csv->output('producers.csv');
    }

    public function tracking()
    {
        $data['contract_payments'] = ContractPayment::all();
        return view('reports.tracking',$data);
    }

    public function tracking_export()
    {
      header("Content-Type: text/csv; charset=utf-8");
      $payments = ContractPayment::all();
      $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
      $csv->insertOne(['Client','Producer','Amount Expected','Amount Paid','Difference','Payment Date']);
      foreach ($payments as $payment) {
        $csv->insertOne($payment->toArray());
      }

      $csv->output('payments.csv');
    }
}
