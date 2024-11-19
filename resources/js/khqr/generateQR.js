// Import the bakong-khqr package
import { BakongKHQR, khqrData, IndividualInfo, MerchantInfo } from "bakong-khqr";

// Export the function to use in your Blade
export function generateQRCode() {
    const optionalData = {
        currency: khqrData.currency.khr,
        amount: 1,
        billNumber: "#0001",
        mobileNumber: "85516883288",
        storeLabel: "Bus4U",
        terminalLabel: "Bus Ticketing",
    };
    
    const individualInfo = new IndividualInfo(
        "hav_mengheng@wbkh",
        khqrData.currency.khr,
        "mengheng",
        "Phnom Penh",
        optionalData
    );
    
    const khqr = new BakongKHQR();
    const ans = khqr.generateIndividual(individualInfo);
    
    console.log("Response: " + ans);
}

