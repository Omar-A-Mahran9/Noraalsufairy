<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ether Wallet</title>
</head>
<body>
    <h1>Ether Wallet</h1>

    <form action="/create-wallet" method="POST">
        @csrf
        <button type="submit">Create Wallet</button>
    </form>

    <form action="/check-balance" method="POST">
        @csrf
        <input type="text" name="address" placeholder="Enter Wallet Address">
        <button type="submit">Check Balance</button>
    </form>

    <form action="/send-transaction" method="POST">
        @csrf
        <input type="text" name="from" placeholder="From Address">
        <input type="text" name="to" placeholder="To Address">
        <input type="text" name="value" placeholder="Amount (ETH)">
        <button type="submit">Send Transaction</button>
    </form>
</body>
</html>
