Alpine.data("data", () => ({
    myaccount: false,
    createAccount: false,
    Accounts: false,
    Pesan: false,
    dataAccount: {},
    dataPesan: {},

    test(accounts) {
        this.dataAccount = JSON.parse(accounts);
        this.Accounts = true;
    },

    pesandokumen(valueData) {
        this.dataPesan = JSON.parse(valueData);
        this.Pesan = true;
    },

    term: "",
}));
