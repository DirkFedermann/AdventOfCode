package main

import (
	"crypto/md5"
	"fmt"
	"io"
)

func main() {
	// Santa needs help mining some AdventCoins
	// He needs to find MD5 hashes that start with at least 5 zeroes.
	// The secret key is the input followed by the lowest positive number in decimal

	// examples:
	// abcdef609043 as the secret key results in 000001dbbfa...

	// Part One
	// Find the lowest number with 5 leading zeroes
	fmt.Printf("The lowest number with 5 leading zeroes is: %s\n", partOne())

	// Part Two
	// Find the lowest number with 6 leading zeroes
	fmt.Printf("The lowest number with 6 leading zeroes is: %s\n", partTwo())
}

func partOne() string {
	i := 0
	for {
		h := md5.New()
		secretKey := input() + fmt.Sprint(i)
		io.WriteString(h, secretKey)
		hash := fmt.Sprintf("%x", h.Sum(nil))
		if hash[:5] == "00000" {
			break
		}
		if i > 1000000000 {
			fmt.Println("something is wrong.")
			break
		}
		i++
	}

	return fmt.Sprint(i)
}

func partTwo() string {
	i := 0
	for {
		h := md5.New()
		secretKey := input() + fmt.Sprint(i)
		io.WriteString(h, secretKey)
		hash := fmt.Sprintf("%x", h.Sum(nil))
		if hash[:6] == "000000" {
			break
		}
		if i > 1000000000 {
			fmt.Println("something is wrong.")
			break
		}
		i++
	}

	return fmt.Sprint(i)
}

func input() string {
	return "iwrupvqb"
}
