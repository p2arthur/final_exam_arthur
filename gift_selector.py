

import sys
gifts = [
    "Book", "Toy", "Gadget", "Video Game", "Headphones",
    "Smartphone", "Laptop", "Watch", "Shoes", "Wallet",
    "Headset", "Camera", "Drone", "Smart Watch", "Bluetooth Speaker"
]


def calculate_gift_code(indices):
    code = 0
    for index in indices:
        code |= (1 << index)
    return code


def main():
    indices = sys.argv[1].split(",") if len(sys.argv) > 1 else []

    try:
        indices = [int(i) for i in indices if 0 <= int(i) < len(gifts)]
    except ValueError:
        indices = []

    selected_gifts = [gifts[i] for i in indices]
    gift_code = calculate_gift_code(indices)

    html_output = f"""
    <h2>Your Selected Gifts:</h2>
    <ul>
        {''.join(f"<li>{gift}</li>" for gift in selected_gifts)}
    </ul>
    <h3>Gift Code: {gift_code}</h3>
    <a href="gift_form.php">Go Back</a>
    """
    print(html_output)


if __name__ == "__main__":
    main()
