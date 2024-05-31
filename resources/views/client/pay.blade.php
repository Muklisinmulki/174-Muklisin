<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/client/pay/styles.css') }}">
</head>
<body>
  <header>
    <div class="container">
      <div class="left">
        <h3>BILLING ADDRESS</h3>
        <form action="">
          Full name
          <input type="text" name="" placeholder="Enter name">
          Email
          <input type="text" name="" placeholder="Enter email">
          Address
          <input type="text" name="" placeholder="Enter address">
          City
          <input type="text" name="" placeholder="Enter city">

          <div id="zip">
            <label for="">
              State
              <select>
                <option value="">Choose State..</option>
                <option value="">Rajasthan</option>
                <option value="">Hariyana</option>
                <option value="">Uttar Pradesh</option>
                <option value="">Madhya Pradesh</option>
              </select>
            </label>
            <label for="">
              Zip code
              <input type="number" name="" placeholder="Zip code">
            </label>
          </div>
        </form>
      </div>
      <div class="right">
        <h3>PAYMENT</h3>
        <form action="">
          Accepted Card <br>
          <img width="75" src="{{ asset('img/visa.png') }}" alt="">
          <img width="100" src="{{ asset('img/mc.png') }}" alt="">
          <br>

          Credit card number
          <input type="text" name="" placeholder="Enter card number">
          Exp month
          <input type="text" name="" placeholder="Enter Month">

          <div id="zip">
            <label for="">
              Exp year
              <select>
                <option value="">Choose Year..</option>
                <option value="">2022</option>
                <option value="">2023</option>
                <option value="">2024</option>
                <option value="">2025</option>
              </select>
            </label>
            <label for="">
              CVV
              <input type="number" name="" placeholder="CVV">
            </label>
          </div>
        </form>
        <input type="submit" name="" value="Proceed to Checkout">
        <button onclick="history.back()">Back</button>
      </div>
    </div>
  </header>
</body>

</html>