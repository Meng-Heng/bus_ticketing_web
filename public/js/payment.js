const {BakongKHQR, khqrData, IndividualInfo, MerchantInfo, SourceInfo} = require("bakong-khqr");

const optionalData = {
    currency: khqrData.currency.usd,
    amount: 0.10,
    mobileNumber: "85516883288",
    storeLabel: "Bus Ticketing",
    terminalLabel: "Cashier_1",
    purposeOfTransaction: "test",
    languagePreference: "km",
    merchantNameAlternateLanguage: "ហាវ ម៉េងហេង",
    merchantCityAlternateLanguage: "ភ្នំពេញ"
};
const individualInfo = new IndividualInfo(
    "havmengheng111@gmail.com",
    "HAV MENGHENG",
    "PHNOM PENH",
    optionalData);

const KHQR = new BakongKHQR();
const individual = KHQR.generateIndividual(individualInfo);
console.log("KHQR: " + individual)
console.log("qr: " + individual.data.qr);
console.log("md5: " + individual.data.md5);
    