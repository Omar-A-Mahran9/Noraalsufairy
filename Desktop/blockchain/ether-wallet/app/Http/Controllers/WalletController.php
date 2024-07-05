<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Web3\Web3;
use Web3\Contract;

class WalletController extends Controller
{
    private $web3;

    public function __construct()
    {
        $this->web3 = new Web3('https://mainnet.infura.io/v3/655656656');
    }

    public function index()
    {
        return view('wallet.index');
    }

    public function createWallet()
    {
        $web3 = $this->web3;

        $web3->personal->newAccount('', function ($err, $account) {
            if ($err !== null) {
                return response()->json(['error' => $err->getMessage()]);
            }
            return response()->json(['address' => $account]);
        });
    }

    public function checkBalance(Request $request)
    {
        $address = $request->input('address');
        $web3 = $this->web3;

        $web3->eth->getBalance($address, function ($err, $balance) {
            if ($err !== null) {
                return response()->json(['error' => $err->getMessage()]);
            }
            $balanceInEther = $web3->utils->fromWei($balance, 'ether');
            return response()->json(['balance' => $balanceInEther]);
        });
    }

    public function sendTransaction(Request $request)
    {
        $web3 = $this->web3;

        $transaction = [
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'value' => $web3->utils->toWei($request->input('value'), 'ether'),
            'gas' => 21000,
            'gasPrice' => $web3->utils->toWei('20', 'gwei')
        ];

        $web3->eth->sendTransaction($transaction, function ($err, $transactionHash) {
            if ($err !== null) {
                return response()->json(['error' => $err->getMessage()]);
            }
            return response()->json(['transaction' => $transactionHash]);
        });
    }
}
