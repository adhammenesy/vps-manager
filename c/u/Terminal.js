class Terminal {
    constructor(port) {
        this._input = '';
        this._port = port;
    }

    init(input, vps) {
        const cmds = {
            "black start": async () => {
                const username = prompt("Enter username");
                const password = prompt("Enter password");

                try {
                    const response = await fetch("/Backside/Connection.start.php?vps_id=" + vps.id + "&username=" + username + "&password=" + password);

                    if (!response.ok)
                        return { reply: `An error occurred while processing your request\ncheck your information`, error: true };


                    const data = await response.json();
                    console.log(data);
                    return this.run(username, password);

                } catch (error) {
                    return { reply: `An error occurred while processing your request.`, error: true };
                }
            },
            "black": () => {
                return {
                    reply: `
black Help Menu:\nblack start - run the vps
                `, error: false
                };
            }
        }

        if (cmds[input]) {
            this._input = input;
            return cmds[input]();
        } else return { reply: `command "${input}" is not recognized as name of cmdlet`, error: true };
    }

    // main system cmds

    run(username, password) {
        return parseInt(password) !== 33000
            ? { reply: `Wrong password`, error: true }
            : { reply: `Welcome to the vps: ${username}`, error: false };
    }
}